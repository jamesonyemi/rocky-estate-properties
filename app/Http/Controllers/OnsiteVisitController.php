<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Input;

class OnsiteVisitController extends Controller
{

    private static $relativePath    = '/project-documents/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onsiteVisit   =  DB::table('vw_onsite_visit');
        $getAllVisit   =  $onsiteVisit->get();
        return view('onsite_visit.index', compact('getAllVisit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');
        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients  = DB::table('tblclients')->get();

        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('onsite_visit.create', compact('genders', 'townId','regions', 'regionId', 'clients', 'project_status', 'project_visited'));
    }

    public function clientToProject($id)
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$id)->pluck("title","pid");
        return json_encode($clientProject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code
        $img_name   =   $request->hasFile('img_name');
        static::validateImageMimeType($img_name);

        if ( $img_name ) {

            $destinationPath    =   public_path() . static::$relativePath;
            $files              =   $request->file('img_name');   // will get all files
            $ImagePathInArray   =   static::$relativePath.$files;

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                $b64imageEncoded     =  base64_encode($file_name);
                $full_path           =  $file->move($destinationPath, $file_name);    //move files to destination folder
                $fileNamesInArray[]  =  $file_name;
                $base64img_encode[]  =  $b64imageEncoded;

            }
        }
                $save_visit = DB::table('tblvisit')->insertGetId(array_merge(
                    request()->except(['_token', '_method', 'img_name', 'base64img_encode', 'clientid','pid']),
                    [
                     'vdate'    => $request->input('vdate'),
                     'vtime'    => date("h:i:s"),
                     'vnumber'  => uniqid(),
                     'status'   => $request->input('status'),
                     'comments' => !empty($request->input('comments')) ?  $request->input('comments') : '',

                     ]));

                $lastInsertedRowOnVisit =  DB::table('tblvisit')->latest('vid')->first();
                $Id                     =  $lastInsertedRowOnVisit->vid;
                $vId                    =  $lastInsertedRowOnVisit->vid;
                $statusId               =  $lastInsertedRowOnVisit->status;

                $generateVnumber        =  ['vnumber' => static::generateUniqueCode($vId)];
                $updateVnumber          =  DB::table('tblvisit')->where('vid', $Id )->update($generateVnumber);

                $projectImgSaveOnvisit  =  DB::table('tblprojectimage')->insertGetId(array_merge(
                    request()->except(['_token', '_method','vdate', 'comments','status',]),
                    [
                        'img_name'         => json_encode($fileNamesInArray),
                        'img_path'         => json_encode($ImagePathInArray),
                        'base64img_encode' => json_encode($base64img_encode),
                        'vid'              => $save_visit,
                        'status_id'        => $statusId,
                        ]));

                return redirect()->route('projects.index')->with('success', 'Project Image #' . "\n" . $projectImgSaveOnvisit . ' Created Sucessfully');

    }

    public static function generateUniqueCode($vnumber)
    {
        return '#' . str_pad($vnumber, 8, "0", STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id                 = PaymentController::decryptedId($id);
        $onsiteVisit        = DB::table('vw_onsite_visit');
        $getAllVisit        = $onsiteVisit->where('vid', $id)->get();
        $clientWithProjects = ClientController::clientWithProjects();
        $projects           = DB::table('tblproject')->get();
        return view('onsite_visit.view', compact('getAllVisit', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id                 = PaymentController::decryptedId($id);
        $onsiteVisit        = DB::table('vw_onsite_visit');
        $getAllVisit        = $onsiteVisit->where('vid', $id)->get();
        $clientWithProjects = ClientController::clientWithProjects();
        $projects           = DB::table('tblproject')->get();
        return view('onsite_visit.edit', compact('getAllVisit', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $id          = PaymentController::decryptedId($id);
        $comments    = $request->input('comments');
        $updateData  = ClientController::allExcept();
        $onsiteVisit = DB::table('tblvisit');
        $update      = $onsiteVisit->where('vid', $id)->update( array_merge($updateData, ['comments' => $comments ]) );

        if ($update)
        {
            return redirect()->route('onsite-visit.index')->with('success', 'Onsite Visit #   ' .$id. ' Updated');
        }
        else
        {
            return redirect()->route('onsite-visit.index')->with('success', 'No Update Yet');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected static function validateImageMimeType( String $img)
    {
        # code...
        $mimeType       =   'png,jpg,jpeg,webp,gif';
        $maxSize        =   '50000';
        $isValidated    =    static::validate(Request(), [ $img => 'required|file|'.$mimeType.'|'.'max:'.$maxSize ]);

        return $isValidated;
    }
}
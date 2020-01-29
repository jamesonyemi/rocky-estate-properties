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

class StageOfCompletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
         //code
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');
        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients  = DB::table('tblclients')->get();
   
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_phase   = DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('stage_completion.index', compact('genders', 'townId','regions', 'regionId', 
                    'clients', 'project_status', 'project_visited', 'project_phase'));
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
        if ($request->hasFile('img_url')) {

            $destinationPath = public_path() . '/master/';
            $files  = $request->file('img_url');   // will get all files

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name  = $file->getClientOriginalName();               //Get file original name
                $full_path  = $file->move($destinationPath, $file_name);    //move files to destination folder
                $image_Url  = $full_path;
            
                $save_visit = DB::table('tblvisit')->insertGetId(array_merge(
                    request()->except(['_token', '_method','img_url','clientid','pid']), 
                    [
                     'vdate'    => $request->input('vdate'), 
                     'vtime'    => date("h:i:s"),
                     'vnumber'  => uniqid(),
                     'status'   => $request->input('status'),
                     'comments' => !empty($request->input('comments')) ?  $request->input('comments') : '', 
                    
                     ]));

                $lastInsertedRowOnVisit =  DB::table('tblvisit')->latest('vid')->first();
                $Id       = $lastInsertedRowOnVisit->vid;
                $vId      = $lastInsertedRowOnVisit->vid;
                $statusId = $lastInsertedRowOnVisit->status;
                
                $generateVnumber = ['vnumber' => static::generateUniqueCode($vId)];
                $updateVnumber   = DB::table('tblvisit')->where('vid', $Id )->update($generateVnumber); 
                
                $projectImgSaveOnvisit = DB::table('tblprojectimage')->insertGetId(array_merge(
                    request()->except(['_token', '_method','vdate', 'comments','status',]),
                    [
                        'img_url' => realpath($image_Url), 
                        'vid' => $save_visit,
                        'status_id' => $statusId,
                        ]));
                    dd($projectImgSaveOnvisit);
                return redirect()->route('projects.index')->with('success', 'Uploaded Image #' . "\n" . $projectImgSaveOnvisit . 'Created Sucessfully');
            }
        }

      
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  
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
        //
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
}
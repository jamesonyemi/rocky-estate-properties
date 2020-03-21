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
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Input;

class StageOfCompletionController extends Controller
{

    private static $relativeImagePath   =   '/stage_of_completion_img/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients  = DB::table('tblclients')->get();
        $stageOfCompletionImg = DB::table('tblstage_image')->get();
        $stageOfCompletion    = static::trackPhaseOfCompletion();

        return view('stage_completion.index', compact(
            'stageOfCompletionImg',
            'stageOfCompletion',
            'clients'
            // 'genders',
            // 'townId',
            // 'regions',
            // 'regionId',
            // 'project_status',
            // 'project_visited',
            // 'project_phase',
            // 'id'
        ));
    }


    public static function trackPhaseOfCompletion()
    {
        # code...
        $stageOfCompletion  = DB::table('tblstage_image as a')
            ->join('tblstage as b', 'b.id', '=', 'a.stage_id')
            ->join('tblclients as c', 'c.clientid', '=', 'a.clientid')
            ->join('tblproject as d', 'd.pid','=', 'a.pid')
            ->join('tblgender as e', 'e.id',  '=', 'c.gender')
            ->join('tblcountry as f', 'f.id', '=', 'c.nationality')
            ->join('tblproject_phase as g', 'g.id', '=', 'a.phase_id')
            ->join('tblstatus as h', 'h.id', '=', 'b.status_id')
            ->join('tblregion as r', 'r.rid', '=', 'd.rid')
            ->join('tbltown as t', 't.tid', '=', 'd.tid')
            ->select('a.id as id', 'a.clientid', 'a.pid',
                        'a.stage_id', 'a.phase_id','g.phase','b.status_id','h.status','a.img_name',
                        'b.amtdetails', 'b.matpurchased', 'c.gender as gender_id', 'd.title',
                        'e.type as gender_type', 'c.nationality as country_id',
                        'f.country_name as client_country', 'c.email as client_email',
                        'c.phone1 as client_first_mobile','c.phone2 as client_second_mobile',
                        'c.dob as client_dob','d.totalcost as project_budget','b.amtspent',
                        'd.rid', 'r.region',
                        'd.tid', 't.town',
                        ( DB::raw('Concat(c.title, " ", c.fname, c.lname) as full_name') ))
            ->orderBy('a.id')->get()->toArray();

            return $stageOfCompletion;
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
        $stageOfCompletionImg = DB::table('tblstage_image')->get();
        $stageOfCompletion    = DB::table('tblstage')->get();

        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_phase   = DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('stage_completion.create', compact(
            'genders',
            'stageOfCompletionImg',
            'stageOfCompletion',
            'townId',
            'regions',
            'regionId',
            'clients',
            'project_status',
            'project_visited',
            'project_phase'
        ));
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
        if ($request->hasFile('img_name')) {

            $destinationPath = public_path() . static::$relativeImagePath;
            $files  = $request->file('img_name');   // will get all files

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name          =  date("Y-m-d_h_i_s") . "_" . $file->getClientOriginalName();
                $b64imageEncoded    =  base64_encode($file_name);
                $full_path          =  $file->move($destinationPath, $file_name);    //move files to destination folder
                $alternative_name[] =  pathinfo($file_name, PATHINFO_FILENAME);    //Get file original name, without extension
                $fileNamesInArray[] =  $file_name;
                $base64img_encode[] =  $b64imageEncoded;
                $imagePath[]        =  static::$relativeImagePath.$file_name;

            }
        }

                $save_projectStage = DB::table('tblstage')->insertGetId(array_merge(
                    request()->except(['_token', '_method', 'clientid', 'pid', 'alt_name', 'img_name']),
                    [
                        'amtspent'     =>  $request->input('amtspent'),
                        'amtdetails'   =>  $request->input('amtdetails'),
                        'matpurchased' =>  $request->input('matpurchased'),
                        'status_id'    =>  $request->input('status_id'),
                        'phase_id'     =>  $request->input('phase_id'),
                        'stage_code'   =>  uniqid(),
                    ]
                ));

                $lastInsertedRow =  DB::table('tblstage')->latest('id')->first();
                $stageId     = $lastInsertedRow->id;
                $stageCodeId = $lastInsertedRow->id;
                $phase_Id    = $lastInsertedRow->phase_id;

                $generateStageCode = ['stage_code' => static::generateUniqueCode($stageCodeId)];
                $updateStageCode   = DB::table('tblstage')->where('id', $stageId )->update($generateStageCode);

                $save_StageCompletion = DB::table('tblstage_image')->insertGetId(array_merge(
                    request()->except(['_token', '_method', 'amtspent', 'status_id', 'matpurchased', 'amtdetails','stage_code']),
                    [
                        'clientid'          =>  $request->input('clientid'),
                        'pid'               =>  $request->input('pid'),
                        'stage_id'          =>  $stageId,
                        'phase_id'          =>  $phase_Id,
                        'alt_name'          =>  json_encode($alternative_name),
                        'img_name'          =>  json_encode($fileNamesInArray),
                        'img_path'          =>  json_encode($imagePath),
                        'base64_img_encode' =>  json_encode($base64img_encode),
                        'uploaded_date'     =>  date("Y-m-d"),
                        'uploaded_time'     =>  date("h:i:s"),
                    ]
                ));

                return redirect()->route('projects.index')->with('success', 'Stage  of Completion  # ' . " \n " . $save_StageCompletion . ' Created Sucessfully');

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
    public function show(Request $request, $id)
    {
        //code
        $id        = PaymentController::decryptedId($id);
        $genders   = DB::table('tblgender')->pluck('id', 'type');
        $regions   = DB::table('tblregion')->pluck('region', 'rid');
        $regionId  = DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients   = DB::table('tblclients')->get();

        $track_stage       = static::trackPhaseOfCompletion();
        $stageOfCompletion = DB::table('tblstage_image')->where('id', $id)->get();

            foreach ($track_stage as $key2 => $value2)
            {

                foreach ($stageOfCompletion as $key => $value)
                {
                    if ($value->id === $value2->id)
                    {
                        $value = $value2 ;
                        $project_phase = $value;
                        $r =  $project_phase;
                    }

                }

            }

        $townId          =  DB::table('tbltown')->get()->pluck('id', 'town');
        $stage1          =  DB::table('tblstage_image')->get()->pluck('id', 'id');
        $project_status  =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_phase   =  DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        $project_visited =  DB::table('tblproject')->get()->where('clientid', $id)->pluck('pid', 'title')->sort();

        return view('stage_completion.show', compact(
            'genders',
            'project_phase',
            'townId',
            'regions',
            'regionId',
            'clients',
            'project_status',
            'project_visited',
            'project_phase',
            'stage1',
            'r',
            'stageOfCompletion'
        ));
    }

    /**
     * The following function gets recursively all the directories,
     * sub directories so deep as you want and the content of them
     * This function lets you scan the directories structure ($directory_depth)
     * so deep as you want as well get rid of all the boring hidden files (e.g. '.','..')
     *
     * @param String $source_dir Source Directory
     * @param Int $directory_depth Specify Direcotry Depth
     * @param Boolean $hidden  get rid of all the boring hidden files (e.g. '.','..')
     * @return String
     * @throws conditon
     **/

    public static function assetsMap($source_dir, $directory_depth = 0, $hidden = FALSE)
    {
        if ($fp = @opendir($source_dir))
        {
            $filedata   = array();
            $new_depth  = $directory_depth - 1;
            $source_dir = rtrim($source_dir, '/').'/';

            while (FALSE !== ($file = readdir($fp)))
            {
                // Remove '.', '..', and hidden files [optional]
                if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
                {
                    continue;
                }

                if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
                {
                    $filedata[$file] = static::assetsMap($source_dir.$file.'/', $new_depth, $hidden);
                }
                else
                {
                    $filedata[] = $file;
                }
            }

            closedir($fp);
            return $filedata;
        }
        echo 'can not open dir';
        return FALSE;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        #code...
        $id                 =   PaymentController::decryptedId($id);
        $genders            =   DB::table('tblgender')->pluck('id', 'type');
        $regions            =   DB::table('tblregion')->pluck('region', 'rid');
        $regionId           =   DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients            =   DB::table('tblclients')->get();
        $gallery            =   static::imageGallery($id);
        $track_stage        =   static::trackPhaseOfCompletion();
        $stageOfCompletion  =   DB::table('tblstage_image')->where('id', $id)->get();

            foreach ($track_stage as $key2 => $value2)
            {

                foreach ($stageOfCompletion as $key => $value)
                {
                    if ($value->id === $value2->id)
                    {
                        $value = $value2 ;
                        $project_phase = $value;
                        $r =  $project_phase;
                    }

                }

            }

        $townId          =  DB::table('tbltown')->get()->pluck('id', 'town');
        $stage1          =  DB::table('tblstage_image')->get()->pluck('id', 'id');
        $project_status  =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_phase   =  DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        $project_visited =  DB::table('tblproject')->get()->where('clientid', $id)->pluck('pid', 'title')->sort();

        return view('stage_completion.edit', compact(
            'genders',
            'project_phase',
            'townId',
            'regions',
            'regionId',
            'clients',
            'project_status',
            'project_visited',
            'project_phase',
            'stage1',
            'r',
            'stageOfCompletion',
            'gallery',
        ));
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
        //code
        $getField    =  DB::table('tblstage_image')->where('id', $id)->select('pid', 'img_name')->first();
        $stagImage   =  DB::table('tblstage_image')->where('id', $id)->get()->pluck('stage_id', 'stage_id');
        $getImage    =  json_decode($getField->img_name);

         foreach ( $stagImage as $key => $value ) {
            $stagId = $value;
            $id     = $stagId;
         }

        $excepts = request()->except(['_token', '_method', 'clientid', 'pid', 'alt_name', 'img_name']);
        $updateStage     =  [
            'amtspent'     =>  $request->input('amtspent'),
            'amtdetails'   =>  $request->input('amtdetails'),
            'matpurchased' =>  $request->input('matpurchased'),
        ];
        $updateStage   =  DB::table('tblstage')->where('id', $id)->update( array_merge( $excepts, $updateStage) );

        if ($request->hasFile('img_name')) {

            $destinationPath =  public_path() . static::$relativeImagePath;
            $files           =  $request->file('img_name');   /** will get all files */

            /** this statement will loop through all incoming files. */
            foreach ($files as $file) {

                $file_name           =  date("Y-m-d_h_i_s") . "_" . $file->getClientOriginalName();
                $imageData           =  base64_encode(static::$relativeImagePath.$file_name);
                print_r($file->getClientOriginalName());
                print_r(($file->getClientOriginalName())); exit;
                // ddd($imageData);
                $b64imageEncoded     =  $imageData;
                $src                 =  'data:'.$file->getClientMimeType().';'.'base64,'.$b64imageEncoded;
                $full_path           =  $file->move($destinationPath, $file_name);    /** move files to destination folder */
                $alternative_name[]  =  $file_name;    /** Get file original name, without extension*/
                $fileNamesInArray[]  =  $file_name;
                $base64img_encode[]  =  $b64imageEncoded;
                $imagePath[]         =  static::$relativeImagePath.$file_name;
            }
        }
        $excepts        =  request()->except(['_token', '_method', 'amtspent', 'status_id', 'matpurchased', 'amtdetails','stage_code']);
        $data           =  [
            'img_name' => json_encode($fileNamesInArray), 'img_path' => json_encode($imagePath),
            'alt_name' => json_encode($alternative_name), 'base64_img_encode' => json_encode($base64img_encode),
        ];
        $incomingUpload =  $data;
        $mergeUpdate    =  array_merge_recursive( $getImage, $incomingUpload );
        dd($mergeUpdate);
        $updateData     =  DB::table('tblstage_image')->where('pid', $getField->pid)->update($mergeUpdate);
        dd($updateData);
        if ($updateData) {
            return redirect()->route('stage-of-completion.index')->with('success', 'Project # '.$getField->pid.' Updated');
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
        // $id             =   PaymentController::decryptedId($id);
        // $deleteImage    =   DB::table('tblstage_image')->where('id', $id)->first();
        // Storage::delete($deleteImage->img_path);
        // $deleteImage->delete();
        return redirect('/admin-portal/stage-of-completion')->with('success', 'Data will Soon Self Delete ');
    }

    /**
     * @param int   $id
     * @param string  $img
     * Check if the image exist in:
        * 1.either a the specified folder or saved relative-image-path
        * 2.then delete image file from folder, if it exist, if not continue
        * 3.then  delete either the image-name from the  database table
        */
    public static function deleteImage($id, $img)
    {
     # code...
        $removeImage    =   static::deleteImageFromFolder($img);
        if ( $removeImage ) {
            # code...
            return static::updateImageList($id, $img);
        }
        return redirect()->route('stage-of-completion.index')->with('success', 'Thank You');
    }

    public static function imageGallery($id)
    {
        # code...
        $gallery    =   DB::table('tblstage_image')->where('id', $id)->select('img_name')->first();
        return $gallery;

    }

    public static function updateImageList($id, $img)
    {
        # code...
        $stageId      =   $id;
        $getImage     =   $img;
        $stageImages  =   DB::table('tblstage_image')->where('id', $stageId)->select('img_name')->first();
        foreach ( json_decode($stageImages->img_name) as $key => $value) {
            $base       =   json_decode($stageImages->img_name);
            if ( $getImage === $value ) {
                if ( in_array($value, ([$value]))) {
                    unset($base[$key]);
                    $img_name   =  $base;
                    $isUpdate   =  DB::table('tblstage_image')->where('id', $stageId)->update(
                            array_merge( ['img_name' => array_values($img_name) ])
                        );
                        $isUpdate;
                }
            }
        }
    }

    public static function deleteImageFromFolder($imageToDelete)
    {
        # code...
        if ( file_exists( public_path( static::$relativeImagePath.$imageToDelete) )) {
            $unLinkImage = unlink( public_path( static::$relativeImagePath.$imageToDelete));
                if ( $unLinkImage ) {
                    return true;
                }
        }
        return false;
    }

    public static function iCanTrim($trim_able)
    {
        $iNeedTrimming  =   trim($trim_able);
        return $iNeedTrimming;
    }

}

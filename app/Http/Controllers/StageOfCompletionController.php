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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        // $genders  = DB::table('tblgender')->pluck('id', 'type');
        // $regions  = DB::table('tblregion')->pluck('region', 'rid');
        // $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        // $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        // $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        // $project_phase   = DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        // $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();
        
        $clients  = DB::table('tblclients')->get();
        $stageOfCompletionImg = DB::table('tblstage_image')->get();
        $stageOfCompletion    = static::trackPhaseOfCompletion();


        return view('stage_completion.index', compact(
            'genders',
            'stageOfCompletionImg',
            'stageOfCompletion',
            'townId',
            'regions',
            'regionId',
            'clients',
            'project_status',
            'project_visited',
            'project_phase',
            'id'
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
            ->select('a.id as id', 'a.clientid', 'a.pid',
                        'a.stage_id', 'a.phase_id','g.phase','b.status_id','h.status','a.img_name', 
                        'b.amtdetails', 'b.matpurchased', 'c.gender as gender_id',
                        'e.type as gender_type', 'c.nationality as country_id',
                        'f.country_name as client_country', 'c.email as client_email',
                        'c.phone1 as client_first_mobile','c.phone2 as client_second_mobile',
                        'c.dob as client_dob','d.totalcost as project_budget','b.amtspent',
                        'd.rid',
                        'd.tid',
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

            $destinationPath = public_path() . '/stage_of_completion_img/';
            $files  = $request->file('img_name');   // will get all files

            //this statement will loop through all files.
            foreach ($files as $file) {

                $file_name          =  date("Y-m-d h_i_s") . "_" . $file->getClientOriginalName();
                $b64imageEncoded    =  base64_encode($file_name);                     
                $full_path          =  $file->move($destinationPath, $file_name);    //move files to destination folder
                $alternative_name[] =  date("Y-m-d h_i_s") . "_" . pathinfo($file_name, PATHINFO_FILENAME);    //Get file original name, without extension
                $fileNamesInArray[] =  $file_name;
                $base64img_encode[] =  $b64imageEncoded;
     
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

                // print_r($save_projectStage); 
              
                $lastInsertedRow =  DB::table('tblstage')->latest('id')->first();
                $stageId     = $lastInsertedRow->id;
                $stageCodeId = $lastInsertedRow->id;
                $phase_Id    = $lastInsertedRow->phase_id;

                $generateStageCode = ['stage_code' => static::generateUniqueCode($stageCodeId)];
                $updateStageCode   = DB::table('tblstage')->where('id', $stageId )->update($generateStageCode);

                // print_r($updateStageCode);


                $save_StageCompletion = DB::table('tblstage_image')->insertGetId(array_merge(
                    request()->except(['_token', '_method', 'amtspent', 'status_id', 'matpurchased', 'amtdetails','stage_code']),
                    [
                        'clientid'      =>  $request->input('clientid'),
                        'pid'           =>  $request->input('pid'),
                        'stage_id'      =>  $stageId,
                        'phase_id'      =>  $phase_Id,
                        'alt_name'      =>  json_encode($alternative_name),
                        'img_name'      =>  json_encode($fileNamesInArray),
                        'uploaded_date' =>  date("Y-m-d"),
                        'uploaded_time' =>  date("h:i:s"),
                    ]
                ));
                print_r($save_StageCompletion);
              
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
    public function edit(Request $request, $id)
    {
        //code  
     
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');
        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $clients  = DB::table('tblclients')->get();

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


        $townId   = DB::table('tblstage_image')->get()->pluck('id', 'town');
        $stage1  = DB::table('tblstage_image')->get()->pluck('id', 'id');
        $project_status  = DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_phase   = DB::table('tblproject_phase')->get()->pluck('id', 'phase');
        $project_visited = DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

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
            'r'
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
        $updateData = ClientController::allExcept();
        $update_project = DB::table('tblproject')->where('pid', $id)->update($updateData);
        return redirect()->route('projects.index')->with('success', 'Project # '.$id.' Updated');
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

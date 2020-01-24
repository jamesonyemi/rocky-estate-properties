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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // $clientProject = ProjectController::clientToProject();

        $clients = DB::table('tblclients')->get()->pluck('fname', 'clientid');
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $project_visited =  DB::table('tblproject')->get()->pluck('pid', 'title')->sort();

        return view('onsite_visit.create', compact('genders', 'townId','regions', 'regionId', 'clients', 'project_status', 'project_visited'));
    }

    public function clientToProject($clientid) 
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$clientid)->pluck("title","clientid");
        // dd($clientProject);
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
        // $visit_date = 

        if ($request->hasFile('project_photo')) 
        {
            $destinationPath = public_path().'/master/';
            $files = $request->file('project_photo');  // will get all files

            //this statement will loop through all files.
            foreach ($files as $file)               
            {                              
                $file_name  = $file->getClientOriginalName();   //Get file original name
                $full_path  = $file->move($destinationPath , $file_name);    //move files to destination folder
                $image_Url  = $full_path;
            }
        }
    
        $project_visited =  DB::table('tblproject')->get()->pluck('pid', 'title')->sort();
        $postData  = ClientController::allExcept();
        $save_visit = DB::table('tblprojectimage')->insertGetId($postData);
        return redirect()->route('projects.index')->with('success', 'Project #' . "\n" . $save_visit . 'Created Sucessfully');
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

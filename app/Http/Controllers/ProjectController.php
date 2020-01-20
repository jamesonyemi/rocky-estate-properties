<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code 
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $projects       =  DB::table("tblproject");
        $all_projects   =  $projects->get();
        return view('projects.index', compact('all_projects', 'regions', 'project_status'));
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
        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $townId = DB::table('tbltown')->get()->pluck('tid', 'town');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');

        return view('projects.create', compact('genders', 'townId', 'regionId', 'project_status'));
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
        // dd($request->input());
        $postData      = ClientController::allExcept();
        $createProject = DB::table('tblproject')->insertGetId($postData);
        return redirect()->route('projects.index')->with('success', 'Project #' . "\n" . $createProject . 'Created Sucessfully');
    }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }

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
    public function edit($projectid)
    {
        $projects = DB::table('tblproject')->get();
        $genders  = DB::table('tblgender')->get();
        $regions  = DB::table('tblregion')->get();
        $countries  = DB::table('tblcountry')->get();

        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $townId    = DB::table('tbltown')->get()->pluck('town', 'tid');
        $regionId = DB::table('tblregion')->get()->pluck('rid', 'region');
        $projectId = DB::table('tblproject')->where('pid', $projectid)->get();
        $countryId  = DB::table('tblcountry')->get()->pluck('country_name', 'id');
        $project_status =  DB::table('tblstatus')->get()->pluck('status', 'id');
        

        return view('projects.edit', compact('projectId', 'projects', 'countries', 'townId', 
                                            'regions', 'countryId', 'project_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectid)
    {
        // dd($_POST);
        $updateData = ClientController::allExcept();
        $update_project = DB::table('tblproject')->where('pid', $projectid)->update($updateData);
        return redirect()->route('projects.index')->with('success', 'Project # '.$projectid.' Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $projectid
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectid)
    {
        //code
        $flag_as_deleted    =  ['isdeleted' => "yes"];
        $update_clientInfo  =  DB::table('tblproject')->where('clientid', $projectid)->update($flag_as_deleted);
        return redirect('/project')->with('success', 'Client Info Deleted');
    }

    public function genderStatus($projectid)
    {
        # code...
        $genders     =  DB::table('tblgender')->pluck('id', 'type');
        $projects    = DB::table('tblproject')->where('clientid', $projectid)->get();
        return view('project.edit', compact('genders', 'project'));
    }

    public function updateGenderStatus(Request $request, $projectid)
    {


        # code...
        $flag_as  =  ['gender' => "1"];
        $genders  =  DB::table('tblgender')->pluck('id', 'id');
        // $gender_modified       =  $request->input('gender');
        $client_gender   =  DB::table('tblproject')->where('clientid', $projectid)->update($flag_as);
        return redirect()->route('project.edit');
    }
}

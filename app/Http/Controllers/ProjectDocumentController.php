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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class ProjectDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $projectDocs = DB::table('tblprojectdocs')->get();
        return view('project_documents.index', compact('projectDocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects       =  DB::table("tblproject");
        $all_projects   =  $projects->get();
        $clientWithProjects = ClientController::clientWithProjects();
        return view('project_documents.create', compact('all_projects','clientWithProjects') );
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
            if ($request->hasFile('docname')) {

                $relativePath    = '/project-documents/';
                $destinationPath = public_path() . $relativePath;
                $files  = $request->file('docname');   // will get all files

                //this statement will loop through all files.
                foreach ($files as $file) {

                    $file_name          =  date("Y-m-d h_i_s") . "_" . $file->getClientOriginalName();
                    $b64imageEncoded    =  base64_encode($file_name);                     
                    $full_path          =  $file->move($destinationPath, $file_name);    //move files to destination folder
                    $alternative_name[] =  date("Y-m-d h_i_s") . "_" . pathinfo($file_name, PATHINFO_FILENAME);    //Get file original name, without extension
                    $fileNamesInArray[] =  $file_name;
                    $base64img_encode[] =  $b64imageEncoded;
                    $doc_link[]         =  $relativePath.$file_name;
        
                }
            }
        
            $save = DB::table('tblprojectdocs')->insertGetId(array_merge(
                request()->except(['_token', '_method', 'clientid', 'pid', 'alt_name', 'docname']),
                [
                    'pid'          =>  $request->input('pid'),
                    'is_ready'     =>  $request->input('is_ready'),
                    'is_submitted' =>  $request->input('is_submitted'),
                    'is_prepared'  =>  $request->input('is_prepared'),
                    'docname'      =>  json_encode($fileNamesInArray),
                    'doc_link'     =>  json_encode($doc_link),
                ]
            ));
    
       return redirect()->route('project-docs.create')->with('success', 'Document #  ' .$save. ' Recorded Sucessfully');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id             =  PaymentController::decryptedId($id);
        $owners         =  DB::table('vw_projectdocs')->get();
        $projectDocs    =  DB::table('tblprojectdocs')->get();
        $projects       =  DB::table("tblproject");
        $all_projects   =  $projects->get();
        $clientWithProjects = ClientController::clientWithProjects();
        return view('project_documents.show', compact('all_projects','clientWithProjects', 'projectDocs', 'owners') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id             =  PaymentController::decryptedId($id);
        $projectDocs    =  DB::table('tblprojectdocs')->get();
        $projects       =  DB::table("tblproject");
        $all_projects   =  $projects->get();
        $clientWithProjects = ClientController::clientWithProjects();
        return view('project_documents.update', compact('all_projects','clientWithProjects', 'projectDocs') );
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

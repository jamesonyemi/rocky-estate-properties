<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Input;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $personal_title  = DB::table('tbltitle')->where('active', 'yes')->get();
        return view('system_setup.personal_title.index', compact( 'personal_title' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $personal_title  = DB::table('tbltitle')->get();
        return view('system_setup.personal_title.create', compact( 'personal_title' ));
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
        $postData       = ClientController::allExcept();
        $create_country = DB::table('tbltitle')->insert( array_merge(
            $postData, [
             'salutation' => ucfirst($request->salutation),
            ]
          ));

        // dd($create_country); //for testing
        return redirect()->route('title.index')->with('success', 'New Personal Title Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //code
         $personal_title = DB::table('tbltitle')->where('tid', $id)->get();
         return view('system_setup.personal_title.show', compact('personal_title' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //code
         $personal_title = DB::table('tbltitle')->where('tid', $id)->get();
         return view('system_setup.personal_title.edit', compact('personal_title' ));
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
        $updateData = ClientController::allExcept();
        $update     = DB::table('tbltitle')->where('tid', $id)->update($updateData);
        return redirect()->route('title.index')->with('success', 'Personal Title #  ' .$id. '   Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flaged_as_deleted  =  ['active' => "no" ];
        $deleted = DB::table('tbltitle')->where('tid', $id)->update($flaged_as_deleted);
        return redirect()->route('title.index')->with('success', 'Personal Title  #  ' .$id. '   Info Deleted');
    }
}
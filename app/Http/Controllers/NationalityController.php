<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Input;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $nationality  = DB::table('tblcountry')->where("isdeleted", false)->get();
        return view('system_setup.nationality.index', compact( 'nationality' ));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality  = DB::table('tblcountry')->get();
        return view('system_setup.nationality.create', compact( 'nationality' ));
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
       $create_country = DB::table('tblcountry')->insert( array_merge(
           $postData, [
            'country_code' => strtoupper($request->country_code),
            'country_name' => ucfirst($request->country_name)
           ]
         ));

       return redirect()->route('nationality.index')->with('success', 'New Country Created Sucessfully');
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
        $nationality = DB::table('tblcountry')->where('id', $id)->get();
        return view('system_setup.nationality.show', compact('nationality' ));

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
        $nationality = DB::table('tblcountry')->where('id', $id)->get();
        return view('system_setup.nationality.edit', compact('nationality' ));
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
        $update     = DB::table('tblcountry')->where('id', $id)->update($updateData);
        return redirect()->route('nationality.index')->with('success', 'Country #  ' .$id. '   Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flaged_as_deleted     =  ['isdeleted' => true ];
        $deleted = DB::table('tblcountry')->where('id', $id)->update($flaged_as_deleted);
        return redirect()->route('nationality.index')->with('success', 'Country #  ' .$id. '   Info Deleted');
    }
}
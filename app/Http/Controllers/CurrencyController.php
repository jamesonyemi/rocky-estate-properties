<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Input;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $currency  = DB::table('tblcurrency')->get();
        return view('system_setup.currency.index', compact( 'currency' ));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency  = DB::table('tblcurrency')->get();
        return view('system_setup.currency.create', compact( 'currency' ));
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
       $postData = ClientController::allExcept();
       $create   = DB::table('tblcurrency')->insert( array_merge($postData));

       return redirect()->route('currency.index')->with('success', 'New Currency Created Sucessfully');
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
        $currency = DB::table('tblcurrency')->where('id', $id)->get();
        return view('system_setup.currency.show', compact('currency' ));

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
        $currency = DB::table('tblcurrency')->where('id', $id)->get();
        return view('system_setup.currency.edit', compact('currency' ));
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
        $update     = DB::table('tblcurrency')->where('id', $id)->update($updateData);
        return redirect()->route('currency.index')->with('success', 'Currency #  ' .$id. '   Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flaged_as_deleted     =  ['isdeleted' => true, 'active' => 'no' ];
        $deleted = DB::table('tblcurrency')->where('id', $id)->update($flaged_as_deleted);
        return redirect()->route('currency.index')->with('success', 'Currency #  ' .$id. '   Info Deleted');
    }
}
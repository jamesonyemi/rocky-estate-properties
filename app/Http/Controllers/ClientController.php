<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
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
        $clients        =  DB::table("tblclients");
        $all_clients    =  $clients->get();
        return view('clients.index', compact('all_clients', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $genders = DB::table('tblgender')->pluck('id', 'type');
        return view('clients.create', compact('genders'));
    }

    public static function allExcept() {
        $data = request()->except([ '_token', '_method' ]);
        return $data;
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
        $postData = static::allExcept();
        $createNewClient = DB::table('tblclients')->insert([ $postData ]);
        return redirect()->route('clients.index')->with('success', 'New Client Created Sucessfully');
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
    public function edit($id)
    {
        $clients    = DB::table('tblclients')->get();
        $genders    = DB::table('tblgender')->get();    
        $regions     = DB::table('tblregion')->get();
        $get_regionById    = DB::table('tblregion')->pluck('rid','region');
        $get_clientById    = DB::table('tblclients')->where('clientid', $id)->get();

        // foreach ($clients as $key => $client_value) 
        // {
        //     // foreach ($regions as $region_id => $region) 
        //     // { 
        //     //     // if( ($client_value->nationality === $region->rid) ) 
        //     //     //  {
        //     //         // $region_name  =  $region->region;
        //     //         // $region_id    =  $region->rid;
        //     //         // dd($region_id);
        //     //    // }
        //     // }

        //     foreach ($genders as $gender_id => $gender) 
        //     { 
        //         if( ($client_value->gender === $gender->id) ) 
        //         {
        //             $gender_type  =  $gender->type;
        //             $gender_id    =  $gender->id;
        //         }
        //     }
        // }

        return view('clients.edit', compact('clients', 'genders', 'regions','get_clientById','get_regionById'));
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
        dd($_POST);
        $updateData = static::allExcept();
        $update_clientInfo = DB::table('tblclients')->where('clientid', $id)->update($updateData);
        return redirect()->route('clients.index')->with('success', 'Client Info Updated');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //code
        $flag_as_deleted     =  ['isdeleted' => "yes"];
        $update_clientInfo   =  DB::table('tblclients')->where('clientid', $id)->update($flag_as_deleted);
        return redirect('/clients')->with('success', 'Client Info Deleted');
    }

    public function genderStatus($id)
    {
        # code...
        $genders =  DB::table('tblgender')->pluck('id', 'type');
        $clients    = DB::table('tblclients')->where('clientid', $id)->get();    
        return view('clients.edit', compact('genders', 'clients'));
    }

    public function updateGenderStatus(Request $request, $id)
    {


        # code...
        $flag_as     =  ['gender' => "1"];
        $genders               =  DB::table('tblgender')->pluck('id', 'id');    
        // $gender_modified       =  $request->input('gender');
        $client_gender         =  DB::table('tblclients')->where('clientid', $id)->update($flag_as);
        return redirect()->route('clients.edit');

    }
}

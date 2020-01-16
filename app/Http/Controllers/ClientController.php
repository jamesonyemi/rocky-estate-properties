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
        //code 
        $client_id  = DB::table('tblclients')->where('clientid', $id)->value('clientid');
        $clients    = DB::table('tblclients')->all;
        var_dump($clients); exit;
        return view('clients.edit', compact('client_id'. 'client_id'));
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
        static::processUpdate();
    }

     private static function processUpdate() 
     {
        $clients = DB::table('tblclients')->find($id);

        $clients->title         =   $request->get('title');
        $clients->lname         =   $request->get('lname');
        $clients->oname         =   $request->get('oname');
        $clients->gender        =   $request->get('gender');
        $clients->nationality   =   $request->get('nationality');
        $clients->relationship  =   $request->get('relationship');
        $clients->email         =   $request->get('email');
        $clients->phone1        =   $request->get('phone1');
        $clients->phone2        =   $request->get('phone2');
        $clients->nok           =   $request->get('nok');
        $clients->dob           =   $request->get('dob');

        $clients->save();
        return redirect('/clients')->with('success', 'Client Info Updated!');
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
        $delete_client = Contact::find($id);
        $delete_client->delete();
        return redirect('/clients')->with('success', 'Client Info Deleted!');
    }
}

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

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $towns  = DB::table('tbltown')->get();

        return view('system_setup.towns.index', compact(
            'towns'
        ));
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
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');

        return view('system_setup.towns.create', compact(
            'towns',
            'townId',
            'regions',
            'regionId'
            // 'project_status',
            // 'project_visited',
            // 'project_phase',
            // 'genders',
            // 'id'
        ));
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
        $create_town = DB::table('tbltown')->insertGetId(array_merge(
            $postData,
            [   
                'rid'     =>  $request->input('rid')
            ]
        ));
        
        dd($create_town);
        return redirect()->route('towns.index')->with('success', 'New Town Created Sucessfully');
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
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');
        $regionId = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns    = DB::table('tbltown')->where('tid', $id)->get();

        // I have join and a loop to do here
        $regionTownMap = static::regionTownMap();
        // dd($regionTownMap)

        return view('system_setup.towns.show', compact(
            'towns',
            'townId',
            'regions',
            'regionId',
            'regionTownMap'
            // 'project_visited',
            // 'project_phase',
            // 'genders',
            // 'id'
        ));
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
        $genders  = DB::table('tblgender')->pluck('id', 'type');
        $regions  = DB::table('tblregion')->pluck('region', 'rid');
        $regionId = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId   = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns    = DB::table('tbltown')->where('tid', $id)->get();


        return view('system_setup.towns.edit', compact(
            'towns',
            'townId',
            'regions',
            'regionId'
            // 'project_status',
            // 'project_visited',
            // 'project_phase',
            // 'genders',
            // 'id'
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

    public static function regionTownMap() 
    {
         # code...
         $regionTown  = DB::table('tblregion as a')
         ->join('tbltown as b', 'b.rid', '=', 'a.rid')
         ->select('a.rid as id', 'b.tid', 'b.town')
         ->orderBy('a.rid')->get()->toArray();
         
         return $regionTown;
    }
}

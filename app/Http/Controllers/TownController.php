<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

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
        $regionTown = static::regionTownMap();
        return view('system_setup.towns.index', compact('regionTown'));

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
        $getTown  = static::filterData();

        return view('system_setup.towns.create', compact(
            'townId',
            'regions',
            'regionId',
            'getTown',
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
        $fetchTowns     =   static::filterData();
        $postData       =   ClientController::allExcept();
        $alreadyExist   =   "The town ($request->town) already exist";
        $toLower        =   strtolower($request->input("town"));
        $data           =   [
            'rid'     =>  $request->input('rid'),
            'active'  =>  $request->input('active'),
            'town'    =>  ucfirst($toLower),
        ];

        foreach (json_decode($fetchTowns) as $key => $value)
        {
            # code...
            if ( in_array($request->town, [$value]) )
            {
                # code...
                return redirect()->route('towns.create')->with('info', $alreadyExist);
            }
        }

        $create_town    =   DB::table('tbltown')->insertGetId(array_merge($postData, $data));
        return redirect()->route('towns.index')->with('success', 'Town #  ' .$create_town. ' Created Sucessfully');
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
        $decryptId  = PaymentController::decryptedId($id);
        $genders    = DB::table('tblgender')->pluck('id', 'type');
        $regions    = DB::table('tblregion')->pluck('region', 'rid');
        $regionId   = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId     = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns      = DB::table('tbltown')->where('tid', $decryptId)->get();

        // I have join and a loop to do here
        $regionTownMap = static::regionTownMap();
        foreach ($regionTownMap as $key2 => $regionTown)
            {

                foreach ($towns as $key => $town)
                {
                    if ($town->tid === $regionTown->tid)
                    {
                        $town = $regionTown ;
                        $region_town = $town;
                        $keyMap =  $region_town;
                    }

                }

            }

        return view('system_setup.towns.show', compact(
            'towns',
            'townId',
            'regions',
            'regionId',
            'regionTownMap',
            'keyMap'
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
        $decryptId  = PaymentController::decryptedId($id);
        $genders    = DB::table('tblgender')->pluck('id', 'type');
        $regions    = DB::table('tblregion')->pluck('region', 'rid');
        $regionId   = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId     = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns      = DB::table('tbltown')->where('tid', $decryptId)->get();


        return view('system_setup.towns.edit', compact(
            'towns',
            'townId',
            'regions',
            'regionId',
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
        // code;
        $decryptId    = PaymentController::decryptedId($id);
        $checkStatus  = ( $request->active !== 'yes' ) ? "no" : "yes";
        $updateInfo   = [
            'active' => $checkStatus,
            'town'   => $request->town,
            'rid'   => $request->rid,
        ];
        $update     = DB::table('tbltown')->where('tid', $decryptId)->update( $updateInfo );
        return redirect()->route('towns.index')->with('success', 'Town # ' .$decryptId. '  Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      // code;
      $decryptId   = Crypt::decrypt($id);
      $getTownId   = $decryptId;
      $active      = 'no';
      $deleted     = true;
      $isDeleted   = [ "active" => $active, "is_deleted" => $deleted ];
      $deleted     = DB::table('tbltown')->where('tid', $getTownId)->update($isDeleted);

      return redirect()->route('towns.index')->with('success', 'Town # ' .$getTownId. '  Info Deleted');
    }

    public function restore()
    {

        $regionTown = static::regionTownMap();
        $regionId    = DB::table('tblregion')->get()->pluck('region', 'rid');
        return view('system_setup.towns.restore', compact('regionTown', 'regionId'));

    }

    public function getTown(Request $request, $id)
    {
        $get_data             =  DB::table('tbltown')->where('tid', $id)->get();
        $request->active      =  'yes';
        $request->is_deleted  =  0;
        $isActive             =  [ "active" => $request->active, "is_deleted" => $request->is_deleted ];
        $restore              =  DB::table('tbltown')->where('tid', $id)->update($isActive);
        return json_encode($get_data);
    }

    public function restoreTown(Request $request, $id)
    {

        $id          =  $request->tid;
        ddd($id);
        $active      =  'yes';
        $deleted     =  0;
        $isActive    =  [ "active" => $active, "is_deleted" => $deleted ];
        $deleted     =  DB::table('tbltown')->where('tid', $id)->update($isActive);
        return redirect()->route ('towns.index')->with('success', 'Town # ' .$request->tid. '  was Restored');
    }

    public static function regionTownMap()
    {
         # code...
         $regionTown  = DB::table('tblregion as a')
         ->join('tbltown as b', 'b.rid', '=', 'a.rid')
         ->select('b.tid as tid','b.rid as rid', 'b.town as town', 'a.region','b.active', 'b.is_deleted' )
         ->orderBy('b.tid')->get()->toArray();

         return $regionTown;
    }

    public static function filterData()
    {
         # code...
        $get_data   =  DB::table('tbltown')->get()->pluck('town');
        return json_encode($get_data);
    }
}
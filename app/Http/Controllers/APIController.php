<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{

    public function getRegions()
    {
        $regions = DB::table('tblregion')->pluck("region", "rid");
        return view('projects.create', compact('regions'));
    }

    public function getTowns($id)
    {
        $towns = DB::table("tbltown")->where("rid", $id)->pluck("town", "id");
        return json_encode($towns);
    }

    public function ApiUsers(Request $request)
    {
        return $request->user();
    }
}

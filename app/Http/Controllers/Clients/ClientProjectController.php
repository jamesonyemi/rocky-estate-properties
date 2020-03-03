<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects           =   DB::table('vw_my_projects')->where('user_id', Auth::id() )->select('*');
        $retriveProjects    =   $projects->get();
        $pid                =   $retriveProjects[0]->pid;

        if ( ( count($retriveProjects) === 1 ) ) {
            $singleProject  =   DB::table('vw_my_projects')->where('pid', $pid )->select('*')->first();
            $projectImage       =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();
            $clientId           =   $projectImage->clientid;
            $projectImage       =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $pid)->where('status_id', '2')->select('*');
           
            $image              =   $projectImage->pluck('img_name');
            // ddd($image);
            $payments           =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $pid)->select('amt_received','paymentdate','comments')->get();
            $pay                =   $payments->sum('amt_received');

        return view('client_portal.my_projects.single_project', compact('singleProject','pay','payments','image') );

        }
        return view('client_portal.my_projects.multiple_projects', compact('retriveProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $id             =   PaymentController::decryptedId($id);
        $projects       =   DB::table('vw_my_projects')->where('pid', $id )->select('*')->first();
        $projectImage   =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();
        $clientId       =   $projectImage->clientid;
        $projectImage   =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $id)->where('status_id', '2')->select('*');
        $image          =   $projectImage->pluck('img_name');
        $payments       =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $id)->select('amt_received','paymentdate','comments')->get();
        $pay            =   $payments->sum('amt_received');

        return view('client_portal.my_projects.show', compact('projects','pay','payments','image') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public static function clientWithSingleProject($id)
    {
        
        $id             =   PaymentController::decryptedId($id);
        $projects       =   DB::table('vw_my_projects')->where('pid', $id )->select('*')->first();
        $projectImage   =   DB::table('users')->where('id', Auth::id() )->select('clientid')->first();
        $clientId       =   $projectImage->clientid;
        $projectImage   =   DB::table('tblprojectimage')->where('clientid', $clientId)->where('pid', $id)->where('status_id', '2')->select('*');
        $image          =   $projectImage->pluck('img_name');
        $payments       =   DB::table('tblpayment')->where('clientid', $clientId)->where('pid', $id)->select('amt_received','paymentdate','comments')->get();
        $pay            =   $payments->sum('amt_received');

        return view('client_portal.my_projects.single_project', compact('projects','pay','payments','image') );

    }

    public static  function truncate($text, $chars = 120) 
    {
        if(strlen($text) > $chars) {
            $text = $text.' ';
            $text = substr($text, 0, $chars);
            $text = substr($text, 0, strrpos($text ,' '));
            $text = $text.'...';
        }
        return $text;
    }  
     
}

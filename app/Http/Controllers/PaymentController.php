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
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
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
       $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
       $all_clients    =  DB::table('tblclients')->get();
       $payments       =  DB::table("tblpayment");
       $get_payments   =  $payments->get();
   
       $clientWithProjects = ClientController::clientWithProjects();


       return view('payments.index', compact('get_payments', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients    =  DB::table('tblclients')->get();
        return view('payments.create', compact('get_payments', 'paymode', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));

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
       $newPayment = DB::table('tblpayment')->insertGetId(array_merge(
           $postData,
           [   
               'receivedby'     =>  Auth::id(),
           ]
       ));
       
       return redirect()->route('payments.index')->with('success', 'Payment #  ' .$newPayment. ' Recorded Sucessfully');
    
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
       $regions        =  DB::table('tblregion')->pluck('rid', 'region');
       $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
       $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
       $all_clients    =  DB::table('tblclients')->get();
       $payments       =  DB::table("tblpayment");
       $get_payments   =  $payments->where('id',$id)->get();
   
       $clientWithProjects = ClientController::clientWithProjects();


       return view('payments.show', compact('get_payments', 'regions', 'paymode', 'project_status', 'all_clients', 'clientWithProjects'));
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
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
        $all_clients    =  DB::table('tblclients')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->where('id',$id)->get();
    
        $clientWithProjects = ClientController::clientWithProjects();
 
 
        return view('payments.edit', compact('get_payments', 'paymode', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));
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
        // // code;
        // $updateData = ClientController::allExcept();
        // $update     = DB::table('tblpayment')->where('id', $id)->update($updateData);
        // return redirect()->route('payments.index')->with('success', 'Payment #   ' .$id. ' Updated');
        return 'Men at Work';
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

    public static function additionalCost()     
    {
        return view('payments.additional_cost');
    }

    public static function budgetReview() 
    {
        return view('payments.budget_review');
    }

    public function clientToProject($clientid) 
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$clientid)->pluck("title","pid");
        // dd($clientProject);
        return json_encode($clientProject);
    }
}

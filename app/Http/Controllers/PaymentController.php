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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    public static $targetTable = 'tbltotalbalances';

    public function __construct() {
         static::$targetTable;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $paymode        =  DB::table('tblpaymentmode')->where('active','=', 'yes')->pluck('mode', 'mode');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients    =  DB::table('tblclients')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->get();
        $clientWithProjects = ClientController::clientWithProjects();
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
     
       $isProjectId      =  $request->Input('pid');
       $amt_received     =  $request->input('amt_received');
       $targetTable      =  static::$targetTable;
    
       $getProjectId     =  DB::table('tblproject')->where('pid',  $isProjectId)->get();
       $projectId        =  $getProjectId[0]->pid;
       $totalcost        =  $getProjectId[0]->totalcost;
       $createdBy        =  Auth::id();
      
       $conditon         =  [ 'projectid' => $isProjectId ];
       $data             =  [ 'projectid' => $projectId, 'initial_totalcost' => $totalcost, 'total_payment_made' => $amt_received,'created_by' => $createdBy, ];
       $postData         =  ClientController::allExcept();
       $newPayment       =  DB::table('tblpayment')->insertGetId( array_merge( $postData,[ 'receivedby' => Auth::id(), ]  ));
       
       $lastPaymentMade  =  DB::table('tblpayment')->where('id',  $newPayment)->get()->pluck('amt_received')->first();
       $amtReceived      =  ['total_payment_made' => $lastPaymentMade ]; 
       $pid              =  DB::table('tblpayment')->where('id',  $newPayment)->get()->pluck('pid')->first();
       $findId           =  DB::table($targetTable)->where('projectid', $pid )->get()->first();
       $projectIdExist   =  $findId;
       $isNull           =  is_null($projectIdExist);
   
       if ( ($isNull) ) 
       {
           $firstPaymentMade = static::totalBalances($targetTable, $conditon, array_merge($data, $amtReceived));
       } 
       else 
       {
           $keyExist         =  array_key_exists( "total_payment_made", [ "total_payment_made" => $projectIdExist->total_payment_made]) && !empty( $lastPaymentMade );
           $computeBudget    =  round($projectIdExist->total_payment_made, 2) + round($lastPaymentMade, 2);
           $newTotalComputed =  ['total_payment_made' => $computeBudget ];

           if ( ($keyExist) )
            {   
                $totalPaymentMade = static::totalBalances($targetTable, $conditon, array_merge($data, $newTotalComputed));
            } 
    
            
        }
        return redirect()->route('payments.index')->with('success', 'Payment #  ' .$newPayment. ' Recorded Sucessfully');
    
    }

    public static function totalBalances($table = '', $conditon = [], $arrayValue = [])
    {
        
        $processBalance = DB::table($table)->updateOrInsert($conditon, $arrayValue);
        return $processBalance;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
       $id             =  static::decryptedId($id);
       $regions        =  DB::table('tblregion')->pluck('rid', 'region');
       $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
       $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
       $all_clients    =  DB::table('tblclients')->get();
       $payments       =  DB::table("tblpayment");
       $get_payments   =  $payments->where('id',$id)->get();
       $payId          =  $payments->pluck('id');
       $clientWithProjects = ClientController::clientWithProjects();

       return view('payments.show', compact('get_payments', 'payId', 'regions', 'paymode', 'project_status', 'all_clients', 'clientWithProjects'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $id             =  static::decryptedId($id);
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $paymode        =  DB::table('tblpaymentmode')->pluck('mode', 'mode');
        $all_clients    =  DB::table('tblclients')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->where('id',$id)->get();
        $clientWithProjects = ClientController::clientWithProjects();
 
        return view('payments.edit', compact('get_payments', 'paymode', 'encrypted_id', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));
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
        $id               =  static::decryptedId($id);
        $createdBy        =  Auth::id();
        $updateData       =  ClientController::allExcept(); 
        $update           =  DB::table('tblpayment')->where('id', $id)->update( array_merge($updateData, ['receivedby' => $createdBy] ));

        if ($update) 
        {
            return redirect()->route('payments.index')->with('success', 'Payment #   ' .$id. ' Updated');
        }
        else 
        {
            return redirect()->route('payments.index')->with('success', 'No Update Yet');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Silence is Gold
    }

    public static function additionalCost()     
    {
        
        $costType       =  DB::table('tblcost_type')->pluck('cost_type', 'id');
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->get();
        $clientWithProjects = ClientController::clientWithProjects();
        return view('payments.additional_cost', compact('get_payments', 'costType', 'clientWithProjects'));

    }
    
    public function processAdditionalCost(Request $request)
    {
        # code...
        $isProjectId      =  $request->Input('pid');
        $getProjectId     =  DB::table('tblproject')->where('pid',  $isProjectId)->get();
        $totalcost        =  $getProjectId[0]->totalcost;

        $postData         =  ClientController::allExcept();
        $newPayment       =  DB::table('tbladditionalcost')->insertGetId( array_merge( $postData ));
        $amtAddedOn       =  DB::table('tbladditionalcost')->where('id',  $newPayment)->get()->first();
        $conditon         =  [ 'projectid' => $amtAddedOn->pid ];
        $createdBy        =  [ 'created_by' => Auth::id()];
        
        
        $projectIdLookUp  =  DB::table(static::$targetTable)->get();
        $projectIdExist   =  $projectIdLookUp;
        $keyExist         =  array_key_exists( "initial_totalcost", $projectIdExist[0]) && !empty($amtAddedOn->amt_add_on);
        
        if ( $keyExist )
        {
            $except         =  request()->except(['_token', '_method', 'clientid', 'pid', 'amt_add_on', 'total_payment_made', 'reason','cost_type_id']);
            $computeBudget  =  round($projectIdExist[0]->initial_totalcost, 2) + round($amtAddedOn->amt_add_on, 2);             
            $projectId      =  ['projectid' => $amtAddedOn->pid ];              
            $projectBudget  =  ['initial_totalcost' =>  $computeBudget ];              

            // $updateBudget   =  DB::table(static::$targetTable)->where( 'projectid', $conditon['projectid'])
            //                         ->update( array_merge( $except, $projectId, $projectBudget ));
            $updateBudget   =   static::totalBalances(static::$targetTable, $conditon, array_merge( $except, $projectId, $projectBudget, $createdBy ));

            dd($updateBudget);
            if ( $updateBudget )
            {
                return redirect()->route('payments.index')->with('success', 
                    'Initial Budget of ' .$totalcost. ' Increased to ' .$computeBudget. ' for Project # ' .$projectId);
            }
            else 
            {
                return false;
            }
        }
    
    }

    public static function budgetReview() 
    {
        $regions        =  DB::table('tblregion')->pluck('rid', 'region');
        $paymode        =  DB::table('tblpaymentmode')->where('active','=', 'yes')->get()->pluck('mode', 'mode');
        $currency       =  DB::table('tblcurrency')->get()->where('active','=', 'yes')->pluck('short_name', 'short_name');
        $project_status =  DB::table('tblstatus')->get()->pluck('id', 'status');
        $all_clients    =  DB::table('tblclients')->get();
        $payments       =  DB::table("tblpayment");
        $get_payments   =  $payments->get();
        $clientWithProjects = ClientController::clientWithProjects();

        return view('payments.budget_review', compact('get_payments', 'paymode', 'currency', 'regions', 'project_status', 'all_clients', 'clientWithProjects'));
    }

    public function clientToProject($clientid) 
    {
        $clientProject =  DB::table("tblproject")->where("clientid",$clientid)->pluck("title","pid");
        return json_encode($clientProject);
    }

    public static function encryptedId($id)
    {
        $encrypted = Crypt::encrypt($id);
        return $encrypted;
    }

    public static function decryptedId($id)
    {
        $decrypted = Crypt::decrypt($id);
        return $decrypted;
    }
}

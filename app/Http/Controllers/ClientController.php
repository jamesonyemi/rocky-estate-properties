<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Http\Controllers\PaymentController;
use App\Mail\ClientRegistrationMail;
use App\Notifications\Clients\CorporateClientLoginNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CorporateUserRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        $clientWithProjects =  static::clientWithProjects();
        $regions            =  DB::table('tblregion')->pluck('rid', 'region');
        $clients            =  DB::table("tblclients");
        $all_clients        =  $clients->get();
        $corporate          =  $clients->where('cc_company_name', '!=', '' )->select("*")->get();
            
        return view('clients.index', compact('all_clients', 'corporate', 'regions','clientWithProjects'));
    }

    public static function clientWithProjects()
    {
        # code...
        $clientWithProjects  = DB::table('tblclients')
            ->join('tblproject', 'tblproject.clientid', '=', 'tblclients.clientid')
            ->join('tbltown', 'tbltown.tid', '=', 'tblproject.tid')
            ->join('tblstatus', 'tblstatus.id','=', 'tblproject.statusid')
            ->join('tblregion', 'tblregion.rid', '=', 'tblproject.rid')
            ->select('tblproject.rid as region_id', 'tblregion.region', 'tbltown.tid as location_id',
                        'tbltown.town as location', 'tblproject.title as project_title','tblclients.phone1 as client_prime_contact',
                        'tblclients.phone2 as client_second_contact','tblclients.email as client_email','tblproject.pid',   
                        'tblclients.clientid',( DB::raw('Concat(tblclients.title, " ",tblclients.fname, " ", tblclients.lname) as full_name') ),  
                        'tblstatus.status as client_project_status', 'tblstatus.id as client_project_status_id')
            ->orderBy('tblproject.pid')->where('tblclients.active', '=', 'yes')->get()->toArray();
            
            return $clientWithProjects;
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
        $countryId = DB::table('tblcountry')->get()->pluck('id', 'country_name');
        $titleId = DB::table('tbltitle')->get()->pluck('tid', 'salutation');

        return view('clients.create', compact('genders', 'countryId','titleId'));
    }

    public static function allExcept()
    {
        $data = request()->except(['_token', '_method']);
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
        #code 
        $primaryPhoneNumber  =  $request->phone1;
        $successMessage      =  '"Created Sucessfully, with an Email sent to Sign-Up, please contact client ("'.$primaryPhoneNumber.'") to check their Inbox';
        $postData            =  static::allExcept();
        $createNewClient     =  DB::table('tblclients')->insertGetId([$postData]);
        $client              =  DB::table('tblclients')->where('clientid', $createNewClient)->select('*')->first();
        $currentClientEmail  =  $client->email;

             if ( $createNewClient ) {
                 # code...
                 static::sendRegistrationEmail($currentClientEmail, $client);
             }
        return redirect()->route('clients.index')->with('success', 'Client # "'.$createNewClient. $successMessage);
    }

    public function corporateClient(CorporateUserRequest $request)
    {
       
        $flashMessage   =   'Corporate Client Created Sucessfully, please contact client Id #  ';
        $isValidated = $request->validated();       /* Will return only validated data */

        if ( !$isValidated ) {
            Session::flash('error', $isValidated->messages()->first());
            return redirect()->back()->withInput();
        }
        
        $except    =  static::allExcept();
        $postData  =  static::processCorporateClientData();
        $corporateClient  = DB::table('tblclients')->insertGetId(array_merge($postData));
        $newCorporateUser = DB::table('tblclients')->where('clientid', $corporateClient )->select('clientid','cc_company_name', 'email', 'cc_secondary_email', 'cc_mobile')->first();
                                    
        $secretWord     =   time().random_int(1111, 9999);
        $secretKey      =   $secretWord;
        $roleId         =   [ 'corporate_client' => 5]; //corporate-client role-id
        $isVerified     =   [ 'verified' => true];      //verification status, set to true
        $clientId       =   $newCorporateUser->clientid;
        $company_name   =   $newCorporateUser->cc_company_name;
        $email          =   $newCorporateUser->email;
        $cc_sec_email   =   $newCorporateUser->cc_secondary_email;
        $full_name      =   $company_name;
        $password       =   password_hash($secretKey, PASSWORD_ARGON2I );

        $data           =   [
            'role_id'            => $roleId['corporate_client'], 
            'clientid'           => $clientId,  
            'first_name'         => $company_name,
            'full_name'          => $full_name,
            'email'              => $email, 
            'cc_secondary_email' => $cc_sec_email, 
            'password'           => $password,
            'verified'           => $isVerified['verified'],
        ];

        
        if ( $corporateClient ) {
            # code...                      
            $createCorporateUser =  DB::table('users')->insertGetId(array_merge($data));
            
            if ( $createCorporateUser ) {
                        FacadesNotification::route('mail', $email)->notify(new CorporateClientLoginNotification($email, $secretKey, $company_name));
                    }
                                       
                return redirect()->route('clients.index')->with('success', $flashMessage.$createCorporateUser.' (with phone number '.$newCorporateUser->cc_mobile.') to check their Inbox');
                                                                
            }
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
        $id             = PaymentController::decryptedId($id);
        $clients        = DB::table('tblclients')->get();
        $genders        = DB::table('tblgender')->get();
        $countries      = DB::table('tblcountry')->get();
        
        $genId          = DB::table('tblgender')->get()->pluck('type', 'id');
        $countryId      = DB::table('tblcountry')->get()->pluck('country_name', 'id');
        $clientId       = DB::table('tblclients')->where('clientid', $id)->get();
        $format_date    = static::textualDate();

        return view('clients.show', compact('clientId', 'clients', 'genders', 'genId', 'countries', 'countryId', 'format_date' ));
    }

    public function viewCorporateClient($id)
    {
        $id         = PaymentController::decryptedId($id);
        $corporate  = DB::table('tblclients')->where('clientid', $id)->get();
        return view('clients.view_corporate', compact('corporate'));
    }

    public static function textualDate( $date_field = '')
    {
        # code...
        $text_format = date("l, jS F, Y", strtotime($date_field));
        return $text_format;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = PaymentController::decryptedId($id);
        $clients    = DB::table('tblclients')->get();
        $genders    = DB::table('tblgender')->get();
        $countries  = DB::table('tblcountry')->get();

        $genId      = DB::table('tblgender')->get()->pluck('type', 'id');
        $countryId  = DB::table('tblcountry')->get()->pluck('country_name', 'id');
        $clientId   = DB::table('tblclients')->where('clientid', $id)->get();

        return view('clients.edit', compact('clientId', 'clients', 'genders', 'genId', 'countries', 'countryId' ));
    }

    public function editCorporateClient($id)
    {
        $id         = PaymentController::decryptedId($id);
        $corporate  = DB::table('tblclients')->where('clientid', $id)->get();
        return view('clients.edit_corporate', compact('corporate', 'id'));

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
       
        // $id         = PaymentController::decryptedId($id);
        $updateData = static::allExcept();
        $update_clientInfo = DB::table('tblclients')->where('clientid', $id)->update($updateData);
        return redirect()->route('clients.index')->with('success', 'Client Info Updated');
    }

     public function updateCorporateClient(Request $request, $id)
    {
        
        $updateData = static::processCorporateClientData();
        $update_clientInfo = DB::table('tblclients')->where('clientid', $id)->update(array_merge($updateData));
        return redirect()->route('clients.index')->with('success', 'Corporate Client Info Updated');

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
        $id                  =  PaymentController::decryptedId($id);
        $flag_as_deleted     =  ['isdeleted' => "yes"];
        $update_clientInfo   =  DB::table('tblclients')->where('clientid', $id)->update($flag_as_deleted);
        return redirect('/clients')->with('success', 'Client Info Deleted');
    }

    public function destroyCorporateClient($id)
    {
        $id                  = PaymentController::decryptedId($id);
        $flag_as_deleted     =  ['isdeleted' => "yes"];
        $update_clientInfo   =  DB::table('tblclients')->where('clientid', $id)->update($flag_as_deleted);
        return redirect('/clients')->with('success', 'Corporate Client Info Deleted');
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
        $genders     =  DB::table('tblgender')->pluck('id', 'id');
        $client_gender  =  DB::table('tblclients')->where('clientid', $id)->update($flag_as);
        return redirect()->route('clients.edit');
    }

    public  static function clientFullName()
    {
        # code...
        $clients    = DB::table('tblclients')->get();
            foreach ($clients as $key => $client)
            {
                $title         = $client->title;
                $first_name    = $client->fname;
                $last_name     = $client->lname;
                $concated_name = $title . "\n" . $first_name . "\n". $last_name;
                $full_name     = $concated_name;
                return $full_name;
            }
    }

    public static function sendRegistrationEmail($email, $target)
    {
        # code...
        $send = Mail::to( $email )->send( new ClientRegistrationMail($target) );
        return $send;
    }

    public static function processData( array $data )
    {
        return $data;
    }

    public static function processCorporateClientData()
    {
        # code...
        $postData  =  static::processData([
            
            'cc_secondary_email'    =>  request('secondary_email'),
            'cc_company_name'       =>  request('company_name'),
            'cc_mobile'             =>  request('mobile'),
            'cc_postal_addr'        =>  request('postal_addr'),
            'cc_fax'                =>  request('fax'),
            'cc_tel_no'             =>  request('tel_no'),
            'cc_res_addr'           =>  request('res_addr'),
            'email'                 =>  request('primary_email'),
        ]);
        return $postData;
    }

}

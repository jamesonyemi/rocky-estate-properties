<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class VerifiedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $users          =   DB::table('users');
        $verifiedUsers  =   $users->get();

        return view('users.index', compact('verifiedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'oname' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name  = $request['first_name'];
        $middle_name = $request['middle_name'];
        $last_name   = $request['last_name'];
        $full_name   = $first_name . " " . $middle_name . " " . $last_name;
        $active      = ['active' => 'yes'];
        $password    = $request['password'];
      
        $save_user = DB::table('users')->insertGetId(array_merge(
            request()->except(['_token', '_method', 'password_confirmation']), 
            [
             'first_name'  => $first_name, 
             'middle_name' => $middle_name,
             'last_name'   => $last_name,
             'full_name'   => $full_name,
             'active'      => $active['active'],
             'password'    => bcrypt($password),
        
             ]));

             if ($save_user) 
             {
                return redirect()->route('verified-user.index')->with('success', 'User ID #' . "\n" . $save_user . ' Created Sucessfully');
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
        $id  = PaymentController::decryptedId($id);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id  = PaymentController::decryptedId($id);    

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
        $id  = PaymentController::decryptedId($id);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id  = PaymentController::decryptedId($id);    
    }

    public function import() 
    {
        // dd(User::all());
        $file_name = request()->file("import-users");
        Excel::import(new UsersImport, $file_name);
        
        return redirect('verified-users')->with('success', 'All good!');
    }

    public function export() 
    {
        $name = request()->input("export-users");
        return Excel::download(new UsersExport, $name.'.xlsx');
    }
}

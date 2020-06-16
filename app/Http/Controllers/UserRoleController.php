<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $roles  = DB::table('tblrole')->get();
        return view('system_setup.role.index', compact( 'roles' ));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = DB::table('tblrole')->get();
        return view('system_setup.role.create', compact( 'roles' ));
    }

    public function userRole()
    {
        $roles  = DB::table('tblrole')->get();
        $users  = DB::table('users')->get();
        return view('system_setup.role.user_role', compact( 'roles', 'users' ));
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
       $postData        = ClientController::allExcept();
       $create_role = DB::table('tblrole')->insertGetId( array_merge(
           $postData, [
            'type'      => ucfirst($request->type),
            'isdeleted' => false,
            'active'    => "yes",
           ]
         ));

       return redirect()->route('role.index')->with('success', 'New role # ' .$create_role. ' Created');
    }

    public function assignUserRole(Request $request)
    {

       $user_id         =  $request->input('user_id');
       $role_id         =  $request->input('role_id');
       $postData        =  ClientController::allExcept();

        foreach ($user_id as $value)
        {

            $ids             =  $value;
            $updateRoleId    =  [ 'role_id' => $role_id ];
            $insertData      =  [ 'role_id' => $role_id, 'user_id' => $ids, 'isdeleted' => "no",  'created_by'=> Auth::id(),  ];

            $updateUserRole  =  DB::table('users')->where('id', $ids)->update( array_merge( $updateRoleId ) );
            $create_role     =  DB::table('tbluser_role')->insertGetId( array_merge( $insertData ));

        }

        return redirect()->route('role.index')->with('success', 'Role Assigned Successfully');

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
        $id    =   PaymentController::decryptedId($id);
        $roles =   DB::table('tblrole')->where('id', $id)->get();
        return view('system_setup.role.show', compact('roles' ));

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
        $id    =   PaymentController::decryptedId($id);
        $roles =   DB::table('tblrole')->where('id', $id)->get();
        return view('system_setup.role.edit', compact('roles' ));
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
        $id    =   PaymentController::decryptedId($id);
        $updateData = ClientController::allExcept();
        $update     = DB::table('tblrole')->where('id', $id)->update($updateData);
        return redirect()->route('role.index')->with('success', 'Role #  ' .$id. '   Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $id                    =  PaymentController::decryptedId($id);
        $flaged_as_deleted     =  ['isdeleted' => true,  'active' => "no", ];
        $deleted               =  DB::table('tblrole')->where('id', $id)->update($flaged_as_deleted);
        return redirect()->route('role.index')->with('success', 'Role #  ' .$id. '   Info Deleted');
    }
}
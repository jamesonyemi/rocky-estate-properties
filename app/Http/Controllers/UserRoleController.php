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
       $updateUserRole  =  DB::table('users')->where('id', $user_id)->update( array_merge( [ 'role_id' => $role_id ]) );
    
       $currentRoleId   =  DB::table('users')->where('id', $user_id)->get();
       $getUserId       =  $currentRoleId->pluck('id')->first();
   
       $userRole        =  DB::table('tbluser_role'); 
       $userHasRole     =  $userRole->where('user_id', $getUserId)->get()->first();
      
        if ( is_null( $userHasRole ) ) 
        {
            
            $create_role = DB::table('tbluser_role')->InsertGetId( array_merge(
                    $postData, [
                    'isdeleted' => "no",
                    'created_by'=> Auth::id(),
                ]            
            ));    
            return redirect()->route('role.index')->with('success', 'Role ID #  ' .$role_id. ' Assigned to User #  ' .$user_id);

        }
        else
        {
            if ( !is_null( $userHasRole ) ) 
            {
                $updateRole =  $userRole->where('user_id', $getUserId)->update( array_merge( [ 'role_id' => $role_id, 'created_by'=> Auth::id(), ]) );
                
                if ( intval(true) === $updateRole ) 
                {
                    return redirect()->route('role.index')->with('success', ' USER ID #  ' .$user_id. ', has been granted a new ROLE ID # '.$role_id );              
                }
                else
                {
                    return redirect()->route('role.index')->with('success', ' USER ID #  ' .$user_id. '  Role Unchanged ' );              

                }
            }
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
        $roles = DB::table('tblrole')->where('id', $id)->get();
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
        $roles = DB::table('tblrole')->where('id', $id)->get();
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
        $flaged_as_deleted     =  ['isdeleted' => true,  'active' => "no", ];
        $deleted = DB::table('tblrole')->where('id', $id)->update($flaged_as_deleted);
        return redirect()->route('role.index')->with('success', 'Role #  ' .$id. '   Info Deleted');
    }   
}

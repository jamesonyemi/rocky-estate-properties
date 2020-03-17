<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = 'login';
    private static $ADMIN_LOGIN    =    'login';  
    private static $CLIENT_LOGIN   =    'corporate-login-form'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function resetPassword( User $user, $password)
    {
        $user->forceFill([
            'password' => password_hash($password, PASSWORD_ARGON2I),
            'remember_token' => Str::random(60),
        ])->save();

        if ( $user ) {
            return static::resetPasswordProcessing();
        }
    }

    protected static function resetPasswordProcessing()
    {
        # code...
        // $response = "Okay";
        return static::sendResetResponse();
    }
    
    public static function sendResetResponse()
    {
        $selectedFieldsForUsers  =  ['role_id', 'email', 'clientid' ];        
        $selectedFieldsForRole   =  ['id', 'type' ];   
        $GetResetEmail           =  request()->get('email');
    
        $user            =  DB::table('users')->where('email', $GetResetEmail)->select($selectedFieldsForUsers);
        $grabUserInfo    =  $user->first();
        $getUserRoleId   =  $grabUserInfo->role_id;
    
        $roles           =  DB::table('tblrole')->where('id', $getUserRoleId)->select($selectedFieldsForRole);
        $getRole         =  $roles->first();
        $isSuperOrAdmin  =  ( $getRole->type === 'super-admin' || $getRole->type === 'admin' );
        $isRole          =  ( $getRole->id === 1 || $getRole->id ===  2 );
        
        if ( ( $isSuperOrAdmin ) && ( $isRole ) ) {
            return static::redirectPath( static::$ADMIN_LOGIN);
        }  

        if ( !( ( $isSuperOrAdmin ) && ( $isRole ) ) ) {
            return static::redirectPath( static::$CLIENT_LOGIN );
        }

    }
    
    public static function redirectPath($namedRoute)
    {
        return Redirect::route($namedRoute)->with('message', 'ss');     
    }
   
}

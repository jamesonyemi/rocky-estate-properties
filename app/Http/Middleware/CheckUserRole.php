<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $selectedFields  =  ['id', 'type' ];        
        $roles           =  DB::table('tblrole')->where('id', Auth::user()->role_id)->select($selectedFields);
        $getRole         =  $roles->first();
        $isSuperOrAdmin  =  ( $getRole->type === 'super-admin' || $getRole->type === 'admin' );
        $isRole          =  ( $getRole->id === 1 || $getRole->id ===  2 );
        
        if ( !( $isSuperOrAdmin ) && !( $isRole ) ) {
            abort(403);
        }
        
        return $next($request);
    }
}

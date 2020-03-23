<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultPageController extends Controller
{
    public static function checkIn()
    {
        return view('auth.login');
    }

    public static function checkOut ()
    {
        return redirect('/');
    }

    public static function clientDashboard()
    {
        return view('client_portal.dashboard.index');
    }
}

<?php

namespace App\Exports;

use App\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    // public function collection()
    // {
    //     return User::all();
    // }

    public function view(): View
    {
        return view('users.verified_users', [
            'verifiedUsers' => User::all()
        ]);
    }
}
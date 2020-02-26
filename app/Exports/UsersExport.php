<?php
namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        
        $data   =   [ 'first_name','middle_name','last_name','full_name','email','password',  ];     
       
        $exportableData     =   DB::table('users')->select($data)->get();

            foreach ($exportableData as $key => $value) 
            {
                $value->password = "please enter password";
            }
            return $exportableData;
    }
}
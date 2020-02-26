<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null  
    */
    public function model(array $row)
    {
        return new User([
            'first_name'  => $row[0],
            'middle_name' => $row[1],
            'last_name'   => $row[2],
            'full_name'   => $row[3],
            'email'       => $row[4], 
            'password'    => Hash::make($row[5]),
         ]);
         
    }
}

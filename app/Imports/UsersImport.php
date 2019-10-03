<?php

namespace App\Imports;

use App\User;
use App\Role;

use Maatwebsite\Excel\Concerns\ToModel;

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
        'name' => $row[0],
        'rfc_login' => $row[1],
        'password' =>  bcrypt($row[2]),
        'remember_token' => $row[3],
        'created_at' => $row[4],
        'update_at' => $row[5],
        ]);





    }
}

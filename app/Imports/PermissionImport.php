<?php

namespace App\Imports;

use App\Permission;
use Maatwebsite\Excel\Concerns\ToModel;

class PermissionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Permission([
            'name' => $row[0],
            'display_name' => $row[1],
            'description' => $row[2],
            'created_at' => $row[3],
            'update_at' => $row[4],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Grados;
use Maatwebsite\Excel\Concerns\ToModel;

class GradosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grados([
            'nom_gra' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

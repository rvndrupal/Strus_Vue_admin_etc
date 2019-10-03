<?php

namespace App\Imports;

use App\Carreras;
use Maatwebsite\Excel\Concerns\ToModel;

class CarrerasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Carreras([
            'nom_car' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

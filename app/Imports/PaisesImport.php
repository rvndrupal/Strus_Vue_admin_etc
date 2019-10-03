<?php

namespace App\Imports;

use App\Paises;
use Maatwebsite\Excel\Concerns\ToModel;

class PaisesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Paises([
            'nombre_pais' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

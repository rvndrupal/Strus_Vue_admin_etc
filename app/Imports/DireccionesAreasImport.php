<?php

namespace App\Imports;

use App\DireccionesAreas;
use Maatwebsite\Excel\Concerns\ToModel;

class DireccionesAreasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DireccionesAreas([
            'nombre_dir_are' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

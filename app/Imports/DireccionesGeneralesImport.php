<?php

namespace App\Imports;

use App\DireccionesGenerales;
use Maatwebsite\Excel\Concerns\ToModel;

class DireccionesGeneralesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DireccionesGenerales([
            'nombre_dir_gen' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Escuelas;
use Maatwebsite\Excel\Concerns\ToModel;

class EscuelasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Escuelas([
            'nombre_escuela' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

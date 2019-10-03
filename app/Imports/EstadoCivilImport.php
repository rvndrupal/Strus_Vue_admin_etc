<?php

namespace App\Imports;

use App\EstadoCivil;
use Maatwebsite\Excel\Concerns\ToModel;

class EstadoCivilImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EstadoCivil([
            'nombre' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

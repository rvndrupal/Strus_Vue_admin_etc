<?php

namespace App\Imports;

use App\Idiomas;
use Maatwebsite\Excel\Concerns\ToModel;

class IdiomasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Idiomas([
            'nombre_idioma' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

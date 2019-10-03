<?php

namespace App\Imports;

use App\Titulos;
use Maatwebsite\Excel\Concerns\ToModel;

class TitulosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Titulos([
            'nombre_titulo' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

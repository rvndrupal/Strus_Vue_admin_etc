<?php

namespace App\Imports;

use App\Codigos;
use Maatwebsite\Excel\Concerns\ToModel;

class CodigosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Codigos([
            'nom_codigos' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

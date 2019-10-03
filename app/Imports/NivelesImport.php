<?php

namespace App\Imports;

use App\Niveles;
use Maatwebsite\Excel\Concerns\ToModel;

class NivelesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Niveles([
            'nom_niveles' => $row[0],
            'created_at' => $row[1],
            'update_at' => $row[2],
        ]);
    }
}

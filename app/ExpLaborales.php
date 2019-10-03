<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpLaborales extends Model
{
    protected $fillable= ['usuarios_id','den_puesto','ins_puesto','area_puesto','anos_puesto','fecha_ing_puesto',
'fecha_baj_puesto','doc_puesto'];

        public function usuario()
        {
            return $this->belongsTo('App\Usuarios');
        }
}

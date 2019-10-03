<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solteros extends Model
{
    protected $fillable = ['nombre_hijo','curp_hijo','carga_curp_hijo'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

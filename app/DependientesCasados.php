<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DependientesCasados extends Model
{
    protected $fillable = ['nombre_dep','ap_dep','am_dep'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

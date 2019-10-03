<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    // protected $table = 'estado_civil';
    protected $fillable = ['nombre'];

    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }


}

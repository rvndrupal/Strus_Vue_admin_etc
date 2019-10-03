<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcionciviles extends Model
{
    //protected $fillable = ['opcion_civil'];

    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }

}

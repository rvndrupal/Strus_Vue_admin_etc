<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $fillable = ['nombre_pais'];

    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }

}

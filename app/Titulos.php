<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulos extends Model
{
    protected $fillable = ['nombre_titulo'];

    public function detalles()
    {
        return $this->hasMany('App\Detalles');
    }
}

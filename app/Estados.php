<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{

    protected $fillable = ['nombre'];


    public function municipios()
    {
        return $this->hasMany('App\Municipios');
    }

    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }
}

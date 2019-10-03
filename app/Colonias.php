<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonias extends Model
{
    protected $fillable = ['nombre_col','municipios_id','codigo_postal'];


    public function estado()
    {
        return $this->belongsTo('App\Estados');
    }



    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipios');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $fillable = ['nombre','estados_id'];

    public function estado()
    {
        return $this->belongsTo('App\Estados');
    }

    public function usuario()
    {
        return $this->belongsToMany('App\Usuarios');
    }

    public function colonias()
    {
        return $this->hasMany('App\Colonias');
    }
}

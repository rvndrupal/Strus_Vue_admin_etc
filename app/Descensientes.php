<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descensientes extends Model
{
    protected $fillable = ['nombre_des','ap_des','am_des'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

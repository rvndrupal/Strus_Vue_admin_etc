<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HijosConyuge extends Model
{
    protected $fillable = ['nombre_hijo_coy','edad_hijo_coy'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

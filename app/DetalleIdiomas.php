<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIdiomas extends Model
{
    protected $fillable= ['idiomas_id','nivel_ingles','carga_certificado'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

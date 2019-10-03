<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $fillable=['nombre_idioma','nivel_ingles','carga_certificado'];
}

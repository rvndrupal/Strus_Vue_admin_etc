<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleLaborales extends Model
{
    protected $fillable= ['puesto_actual','codigo_puesto','grado_nivel','usuarios_id','direcciones_generales_id','direcciones_areas_id',
'fecha_ultimo','fecha_senasica','calle_lab','num_lab','col_lab','fecha_gobierno','mun_lab',
'est_lab','cod_lab'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

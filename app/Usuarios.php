<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    // protected $fillable = ['nom','ap','am','foto','rfc','curp','calle','numero','correo_inst','correo_per',
    //     'tel_casa','tel_cel','condicion','pais_id','colonia'

    // ];

   // protected $table = 'users';

    protected $fillable = ['nom','ap','am','curp','rfc','condicion','foto','fecha_nacimiento','paises_id','calle','numero','estados_id',
    'colonias_id','municipios_id','fecha_domicilio','carga_rfc','carga_curp','carga_ife',
    'correo_per','correo_ins','tel_casa','tel_movil','carga_domicilio','estado_civils_id','user_id'

    ];

    public function user()
    {
        // return $this->belongsTo('App\User','users_id');
        return $this->belongsTo('App\User');
    }

    public function paises()
    {
        return $this->belongsTo('App\Paises');
    }

    public function estados()
    {
        return $this->belongsTo('App\Estados','estados_id');
    }

    public function colonias()
    {
        return $this->belongsTo('App\Colonias');
    }

    public function municipios()
    {
        return $this->belongsTo('App\Municipios');
    }

    public function estadoCivil()
    {
        return $this->belongsTo('App\EstadoCivil','estado_civils_id'); //el nombre del id de la tabla
    }

    public function Opcionciviles()
    {
        return $this->belongsTo('App\Opcionciviles','opcionciviles_id'); //el nombre del id de la tabla
    }

    public function solteros()
    {
        return $this->hasMany('App\Solteros');
    }

    public function conyuges()
    {
        return $this->hasMany('App\Conyuges');
    }

    public function HijosConyuges()
    {
        return $this->hasMany('App\HijosConyuge');
    }

    public function Descensientes()
    {
        return $this->hasMany('App\Descensientes');
    }

    public function DetalleEscolaridades()
    {
        return $this->hasMany('App\DetalleEscolaridades');
    }

    public function DetalleIdiomas()
    {
        return $this->hasMany('App\DetalleIdiomas');
    }

    public function DetalleLaborales()
    {
        return $this->hasMany('App\DetalleLaborales');
    }

    public function ExpLaborales()
    {
        return $this->hasMany('App\ExpLaborales');
    }

    public function Seguros()
    {
        return $this->hasMany('App\Seguros');
    }

    public function DependientesCasados()
    {
        return $this->hasMany('App\DependientesCasados');
    }


    //scopes
    public function scopeNombre($query, $nombre)
    {
        if($nombre)
        {
            return $query->where('nom', 'LIKE', "%$nombre%");
        }
    }

    public function scopeAp($query, $ap)
    {
        if($ap)
        {
            return $query->where('ap', 'LIKE', "%$ap%");
        }
    }

    public function scopeAm($query, $am)
    {
        if($am)
        {
            return $query->where('am', 'LIKE', "%$am%");
        }
    }

    public function scopeFn($query, $fechauno, $fechados)
    {
        if($fechauno and $fechados)
        {
            // return $query->where('fecha_nacimiento', 'LIKE', "%$fecha_nacimiento%");
            return $query->whereBetween('fecha_nacimiento', [$fechauno, $fechados]);

        }
    }

    // public function scopeFd($query, $fecha_domicilio)
    // {
    //     if($fecha_domicilio)
    //     {
    //         return $query->where('fecha_domicilio', 'LIKE', "%$fecha_domicilio%");
    //     }
    // }

}

<?php

namespace App\Http\Controllers;
use App\Pais;
use App\Estados;
use App\Colonias;
use App\Codigos;
use App\Municipios;

use Illuminate\Http\Request;

class ImportarController extends Controller
{
    public function importar()
    {
        $path=public_path('Base/datos_completa_prueba.csv');
        $lineas=file($path); //crear las lineas del arreglo
        $utf8=array_map('utf8_encode',$lineas); //lo pasamos a utf8
        $datos= array_map('str_getcsv', $utf8); //con esto se regresa todo en lineas separadas

        //dd($datos);

       //lógica
        for($i=1; $i<sizeof($datos); $i++)
        {
            $colonia=new Colonias();
            $colonia->nombre_col=$datos[$i][2]; //le pasamos su valor dem arreglo
            $colonia->codigo_postal=$datos[$i][3];

            $colonia->municipios_id=$this->getMunicipioId($datos[$i][0], $datos[$i][1]);  //el id de la relacion importante
            //esta funcion espera el nombre de la region y el del municipio

            $colonia->save();
        }
    }



    public function getMunicipioId($estadosName, $MunicipioName)
    {

        $municipio=Municipios::where('nombre_mun', $MunicipioName)->first();

        if($municipio)//si se encuentra
        {
            return $municipio->id;
        }

        $municipio=new Municipios();
        $municipio->nombre_mun=$MunicipioName;

        $estado=Estados::firstOrCreate([
            'nombre' => $estadosName
        ]);


        $municipio->estados_id= $estado->id ;

        $municipio->save();

        return $municipio->id;
    }


}



<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\DetalleLaborales;
use Faker\Generator as Faker;

$factory->define(DetalleLaborales::class, function (Faker $faker) {
    return [
        'puesto_actual' => $faker->text(10),
        'codigo_puesto'=> rand(1,5),
        'grado_nivel'=> rand(1,6),
        'usuarios_id' => rand(1,5),
        'direcciones_generales_id' => rand(1,5),
        'direcciones_areas_id' => rand(1,5),
        'fecha_ultimo' => $faker->date('Y-m-d', 'now'),
        'fecha_senasica' => $faker->date('Y-m-d', 'now'),
        'calle_lab' => $faker->text(10),
        'num_lab' => $faker->text(10),
        'mun_lab'=> rand(1,7),
        'est_lab'=> rand(1,7),
        'col_lab'=> rand(1,7),
        'cod_lab' => rand(1,7),
        'fecha_gobierno' => $faker->date('Y-m-d', 'now'),
    ];
});

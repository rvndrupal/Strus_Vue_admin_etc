<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DetalleEscolaridades;
use Faker\Generator as Faker;

$factory->define(DetalleEscolaridades::class, function (Faker $faker) {
    return [
        'usuarios_id' => rand(1,5),
        'grados_id' 		=> rand(1,5),
        'carreras_id' 		=> rand(1,5),
        'cedula' 		=>  $faker->text(10),
        'escuelas_id' 		=> rand(1,5),
        'titulos_id' 		=> rand(1,5),
        'carga_titulo' => $faker->image('public/TITULOPROFESIONAL',200, 200, 'business', false),
        'carga_cedula' => $faker->image('public/CEDULA',200, 200, 'business', false),
    ];
});

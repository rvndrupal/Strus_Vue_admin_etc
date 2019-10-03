<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DependientesCasados;
use Faker\Generator as Faker;

$factory->define(DependientesCasados::class, function (Faker $faker) {
    return [
        'nombre_hijo' => $faker->text(10),
        'curp_hijo' => $faker->text(10),
        'carga_curp_hijo' => $faker->image('public/CURPHIJOS',200, 200, 'business', false),
        'usuarios_id' => $faker->numberBetween(5,10),
    ];
});

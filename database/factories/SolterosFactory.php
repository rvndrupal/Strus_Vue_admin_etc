<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Solteros;
use Faker\Generator as Faker;

$factory->define(Solteros::class, function (Faker $faker) {
    return [
        'nombre_hijo' => $faker->text(10),
        'curp_hijo' => $faker->text(18),
        'carga_curp_hijo' => $faker->image('public/CURPHIJOS',200, 200, 'business', false),
        'usuarios_id' 		=> rand(1,5),
    ];
});

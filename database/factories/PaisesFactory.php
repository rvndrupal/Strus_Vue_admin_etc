<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Paises;
use Faker\Generator as Faker;

$factory->define(Paises::class, function (Faker $faker) {
    return [
        'nombre_pais'=> $faker->randomElement(['México', 'Estados Unidos','Canada','Brasil','Canada','Francia','China'])
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pais;
use Faker\Generator as Faker;

$factory->define(Pais::class, function (Faker $faker) {
    return [
        'nombre_pais'=> $faker->randomElement(['México', 'Estados Unidos','Canada','Brasil'])
    ];
});

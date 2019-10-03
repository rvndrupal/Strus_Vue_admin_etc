<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Titulos;
use Faker\Generator as Faker;

$factory->define(Titulos::class, function (Faker $faker) {
    return [
        'nombre_titulo'=> $faker->randomElement(['Cedula', 'Título','Cetificado'])

    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Idiomas;
use Faker\Generator as Faker;

$factory->define(Idiomas::class, function (Faker $faker) {
    return [
        'nombre_idioma'=> $faker->randomElement(['Español', 'Ingles','Frances','Italiano'])
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DireccionesGenerales;
use Faker\Generator as Faker;

$factory->define(DireccionesGenerales::class, function (Faker $faker) {
    return [
        'nombre_dir_gen'=> $faker->randomElement(['Sistemas', 'Compras','Desarrollo'])
    ];
});

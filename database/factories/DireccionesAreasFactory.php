<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DireccionesAreas;
use Faker\Generator as Faker;

$factory->define(DireccionesAreas::class, function (Faker $faker) {
    return [
        'nombre_dir_are'=> $faker->randomElement(['Área_Sistemas', 'Área_Compras','Área_Desarrollo'])
    ];
});

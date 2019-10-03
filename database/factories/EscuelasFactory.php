<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Escuelas;
use Faker\Generator as Faker;

$factory->define(Escuelas::class, function (Faker $faker) {
    return [
        'nombre_escuela'=> $faker->randomElement(['Unam', 'Politecnico','Unitec','Itgm','Estado'])
    ];
});

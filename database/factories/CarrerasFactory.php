<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Carreras;
use Faker\Generator as Faker;

$factory->define(Carreras::class, function (Faker $faker) {
    return [
        'nom_car'=> $faker->randomElement(['Sistemas', 'Administración','Contabilida','Derecho','Desarrollo'])
    ];
});

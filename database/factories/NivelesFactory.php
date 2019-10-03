<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Niveles;
use Faker\Generator as Faker;

$factory->define(Niveles::class, function (Faker $faker) {
    return [
        'nom_niveles'=> $faker->randomElement(['N001', 'N002','N003','N004'])
    ];
});

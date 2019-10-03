<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Codigos;
use Faker\Generator as Faker;

$factory->define(Codigos::class, function (Faker $faker) {
    return [
        'nom_codigos'=> $faker->randomElement(['C001', 'C002','C003','C004','C005'])
    ];
});

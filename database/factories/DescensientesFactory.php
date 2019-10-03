<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Descensientes;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Descensientes::class, function (Faker $faker) {
    return [
        'nombre_des' => $faker->text(10),
        'ap_des' => $faker->text(10),
        'am_des' => $faker->text(10),
        'usuarios_id' => rand(1,5)
    ];
});

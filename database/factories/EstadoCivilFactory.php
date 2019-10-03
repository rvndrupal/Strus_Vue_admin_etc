<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\EstadoCivil;
use Faker\Generator as Faker;

$factory->define(EstadoCivil::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->randomElement(['Soltero(a)', 'Casado(a)','Divorciado','Separado','Unión Libre']),
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Grados;
use Faker\Generator as Faker;

$factory->define(Grados::class, function (Faker $faker) {
    return [
        'nom_gra'=> $faker->randomElement(['Primaria', 'Secundaria','Preparatoria','Licanciatura','Posgrado']),
        'condicion' => '1',
    ];
});

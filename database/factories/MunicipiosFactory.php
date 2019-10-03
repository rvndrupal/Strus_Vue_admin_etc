<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Municipios;
use Faker\Generator as Faker;

$factory->define(Municipios::class, function (Faker $faker) {
    return [
        'nombre_mun'=> $faker->randomElement(['Mun1', 'Mun2','Mun3','Mun4','Mun5','Mun6','Mun7','Mun8','Mun9','Mun10']),
        'condicion' => '1',
        'estados_id' => rand(1,8),
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Estados;
use Faker\Generator as Faker;

$factory->define(Estados::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->randomElement(['CDMX', 'Sonora','Yucatan','Sonora','Baja sur','Baja norte','Veracruz','Puebla']),
        'condicion' => '1',

    ];
});

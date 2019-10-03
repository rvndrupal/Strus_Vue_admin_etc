<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Colonias;
use Faker\Generator as Faker;

$factory->define(Colonias::class, function (Faker $faker) {
    return [
        'nombre_col'=> $faker->randomElement(['Col1', 'Col2','Col3','Col4','Col5','Col6','Col7','Col8','Col9','Col10']),
        'codigo_postal' =>  $faker->randomElement(['Cp1', 'Cp2','Cp3','Cp4','Cp5','Cp6','Cp7','Cp8','Cp9','Cp10']),
        'condicion' => '1',
        'municipios_id' => rand(1,100),
    ];
});

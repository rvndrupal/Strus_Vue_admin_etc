<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\ExpLaborales;
use Faker\Generator as Faker;

$factory->define(ExpLaborales::class, function (Faker $faker) {
    return [
        'usuarios_id' => rand(1,5),
        'den_puesto' => $faker->text(10),
        'ins_puesto' => $faker->text(10),
        'area_puesto' => $faker->text(10),
        'anos_puesto' => $faker->text(10),
        'fecha_ing_puesto' => $faker->date('Y-m-d', 'now'),
        'fecha_baj_puesto' => $faker->date('Y-m-d', 'now'),
        'doc_puesto' 	=> $faker->image('public/DOCPUESTO',200, 200, 'business', false),
    ];
});

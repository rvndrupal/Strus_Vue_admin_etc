<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Conyuges;
use Faker\Generator as Faker;

$factory->define(Conyuges::class, function (Faker $faker) {
    return [
        'nombres_coy' => $faker->text(10),
        'primero_coy' => $faker->text(10),
        'segundo_coy' => $faker->text(10),
        'curp_coy' => $faker->text(13),
        'carga_curp_coy' => $faker->image('public/CURPCONYUGES',200, 200, 'business', false),
        'usuarios_id' => rand(1,5)
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DetalleIdiomas;
use App\Model;
use Faker\Generator as Faker;

$factory->define(DetalleIdiomas::class, function (Faker $faker) {
    return [
        'idiomas_id' => rand(1,5),
        'usuarios_id' => rand(1,5),
        'nivel_ingles'=> $faker->randomElement(['0%', '25%','50%','75%','100%']),
        'carga_certificado' => $faker->image('public/CERT_IDIOMAS',200, 200, 'business', false),

    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Seguros;
use Faker\Generator as Faker;

$factory->define(Seguros::class, function (Faker $faker) {
    return [
        'usuarios_id' => rand(1,5),
        'num_seg' => $faker->text(10),
        'enf_seg' => 'si',
        'cual_enf_seg' => $faker->text(30),
        'tipo_seg' => $faker->text(10),
        'dis_seg' => 'si',
        'cual_dis_seg' => $faker->text(30),
        'nom_seg' => $faker->text(10),
        'pri_seg' => $faker->text(10),
        'seg_seg' => $faker->text(10),
        'par_seg' => $faker->text(10),
        'email_seg' => $faker->email,
        'tel_seg' => $faker->randomNumber(),
        'mov_seg' => $faker->randomNumber(),

    ];
});

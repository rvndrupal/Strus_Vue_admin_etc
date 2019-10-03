<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {
    return [
        'nom' => $faker->text(10),
        'ap' => $faker->text(10),
        'am' => $faker->text(10),
        'rfc' => $faker->text(13),
        'curp' => $faker->text(18),
        'foto' 	=> $faker->image('public/Fotos/Usuarios',200, 200, 'people', false),
        'fecha_nacimiento' => $faker->date('Y-m-d', 'now'),
        'fecha_domicilio' => $faker->date('Y-m-d', 'now'),
        'carga_rfc' 	=> $faker->image('public/RFC/',200, 200, 'business', false),
        'carga_curp' 	=> $faker->image('public/CURP/',200, 200, 'business', false),
        'carga_ife' 	=> $faker->image('public/IFE/',200, 200, 'business', false),
        'carga_domicilio' 	=> $faker->image('public/DOMICILIO/',200, 200, 'business', false),


        'paises_id' 		=> rand(1,4),
        'calle' => $faker->text(20),
        'numero' => $faker->text(5),
        'correo_per' => $faker->email,
        'correo_ins' => $faker->email,
        'tel_casa' => $faker->phoneNumber,
        'tel_movil' => $faker->phoneNumber,
        'user_id'=> $faker->numberBetween(3,5),
        'paises_id'=> rand(1,7),
        'estados_id'=> rand(1,10),
        'colonias_id'=> rand(1,100),
        'municipios_id'=> rand(1,100),
        'estado_civils_id'=> rand(1,10),
        'condicion' => '1'


        // 'ife' => $faker->fileExtension('public/Ife','pdf'),
    ];
});

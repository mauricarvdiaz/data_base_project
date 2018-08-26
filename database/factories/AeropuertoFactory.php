<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
	$ciudad = App\Destino::pluck('id_destino')->toArray();
    return [
    	'id_ciudad' => $faker->randomElement($ciudad),
        'calle_aeropuerto' => $faker->streetName,
        'nro_calle_aeropuerto' => $faker->buildingNumber,
        //'ciudad_aeropuerto' => $faker->city,
        'nombre_aeropuerto' => $faker->company,
    ];
});

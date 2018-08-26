<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
	$ciudad = App\Destino::pluck('id_destino')->toArray();
    $nombre = $faker->unique()->company;
    $rut = $faker->unique()->numberBetween($min = 15000, $max = 90000);
    return [
        'rut_hotel' => $rut,
        'nombre'    => $nombre,
        'id_ciudad' => $faker->randomElement($ciudad),
        'nro_calle_hotel' => $faker->buildingNumber,
        'calle_hotel' => $faker->streetName
    ];
});

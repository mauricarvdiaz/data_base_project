<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    $nombre = $faker->unique()->company;
    $rut = $faker->unique()->numberBetween($min = 15000, $max = 90000);
    return [
        'rut_hotel' => $rut,
        'nombre'    => $nombre,
        'ciudad_hotel' => $faker->city,
        'nro_calle_hotel' => $faker->buildingNumber,
        'calle_hotel' => $faker->streetName
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
    return [
        'calle_aeropuerto' => $faker->streetName,
        'nro_calle_aeropuerto' => $faker->buildingNumber,
        'ciudad_aeropuerto' => $faker->city,
        'nombre_aeropuerto' => $faker->company,
    ];
});

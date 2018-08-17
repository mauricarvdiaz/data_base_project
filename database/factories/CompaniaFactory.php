<?php

use Faker\Generator as Faker;

$factory->define(App\Compania::class, function (Faker $faker) {
    return [
        'calle_compania'  => $faker->streetName,
        'nro_calle_compania' => $faker->buildingNumber,
        'ciudad_compania' => $faker->city,
        'nombre_compania' => $faker->company,
    ];
});

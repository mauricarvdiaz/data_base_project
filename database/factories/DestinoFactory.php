<?php

use Faker\Generator as Faker;

$factory->define(App\Destino::class, function (Faker $faker) {
    return [
        'ciudad' => $faker->unique()->city,
        'pais' => $faker->unique()->country
    ];
});

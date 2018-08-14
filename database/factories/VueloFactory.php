<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
        'nro_vuelo' => $faker->unique()->numberBetween($min = 1000000, $max = 9999999),
        'origen' => $faker->address,
        'destino' => $faker->address,
        'fecha_hora_salida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 week'),
        'fecha_hora_llegada' => $faker->dateTimeBetween($startDate = '+1 week', $endDate = '+1 years'),
        'cantidad_pasajeros' => $faker->numberBetween($min = 210, $max = 310),
        'cantidad_equipaje' => $faker->numberBetween($min = 0, $max = 30),
        'precio_vuelo' => $faker->numberBetween($min = 100000, $max = 300000),
        'aerolinea' => $faker->company,
        'nro_escala' => $faker->numberBetween($min = 0, $max = 3),
    ];
});

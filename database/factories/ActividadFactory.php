<?php

use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {

    return [
       'ubicacion' => $faker->city,
       'tipo_actividad' => 'canopy',
       'fecha' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2018-12-30'),
       'descripcion' => $faker->realText($maxNbChars = 100, $indexSize = 2),
       'nro_menores_edad' => $faker->numberBetween($min = 1, $max = 20),
       'nro_mayores_edad' => $faker->numberBetween($min = 1, $max = 20),
       'precio_actividad' => $faker->numberBetween($min = 10000, $max = 50000)
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    $fecha_in = $faker->dateTimeBetween($min = 'now', $max = '+4 week');
    $fecha_out = strtotime('+1 days', strtotime($fecha_in->format('Y-m-d')));
    $fecha_out = date('Y-m-d', $fecha_out);
    $aerolineas = array('LATAM', 'SKY', 'IBERIA', 'JETSMART', 'LAX');
    $ciudades = App\Aeropuerto::pluck('ciudad_aeropuerto')->toArray();
    $ciudadO = $faker->randomElement($ciudades);
    $ciudadD = $faker->randomElement($ciudades);
    if ($ciudadO == $ciudadD) {
        while ($ciudadO == $ciudadD) {
            $ciudadD = $faker->randomElement($ciudades);
        }
    }

    return [
        'nro_vuelo' => $faker->unique()->numberBetween($min = 100000, $max = 999999),
        'origen' => $ciudadO,
        'destino' => $ciudadD,
        'fecha_salida' => $fecha_in->format('Y-m-d'),
        'hora_salida' => $faker->time($format = 'H:i', $max = 'now'),
        'fecha_llegada' => $fecha_out,
        'hora_llegada' => $faker->time($format = 'H:i', $max = 'now'),
        'cantidad_turista' => $faker->numberBetween($min = 0, $max = 100),
        'cantidad_ejecutivo' => $faker->numberBetween($min = 0, $max = 100),
        'cantidad_primera_clase' => $faker->numberBetween($min = 0, $max = 100),
        'cantidad_equipaje' => $faker->numberBetween($min = 1, $max = 2),
        'precio_vuelo' => $faker->numberBetween($min = 100000, $max = 300000),
        'aerolinea' => $faker->randomElement($aerolineas),
        'nro_escala' => $faker->numberBetween($min = 0, $max = 2),
    ];
});

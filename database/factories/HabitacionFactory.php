<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    //$rut = App\Hotel::pluck('rut_hotel')->toArray();
    $fecha_in = $faker->dateTimeBetween($startDate = 'now', $endDate = '2019-12-30');
    $dias = (string) rand(1, 10);
    $d = '+' . $dias . " day";
    $fecha_out = strtotime($d, strtotime($fecha_in->format('Y-m-d')));
    $fecha_out = date('Y-m-d', $fecha_out);
    return [
        'nro_habitacion' => $faker->numberBetween($min = 100, $max = 900),
        'rut_hotel'      => factory('App\Hotel')->create()->rut_hotel,
        'fecha_entrada'  => $fecha_in,
        'fecha_salida'   => $fecha_out,
        'capacidad'      => $faker->numberBetween($min = 1, $max = 4),
        'precio_noche'   => $faker->numberBetween($min = 10000, $max = 200000),
        'tipo'           => $faker->numberBetween($min = 1, $max = 3)
    ];
});
hatchback

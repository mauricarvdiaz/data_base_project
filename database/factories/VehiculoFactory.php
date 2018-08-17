<?php

use Faker\Generator as Faker;

$factory->define(App\Vehiculo::class, function (Faker $faker) {

	$tipo = array('sedan', 'sport', '4x4', 'citycar', 'furgon', 'camioneta');
	$fecha_in = $faker->dateTimeBetween($startDate = 'now', $endDate = '2019-12-31');
	$dias = (string)rand(1, 20);
	$d = '+' . $dias . " day";
	$fecha_out = strtotime($d, strtotime($fecha_in->format('Y-m-d')));
	$fecha_out = date('Y-m-d', $fecha_out);

    return [
        'patente' => $faker->unique()->numberBetween($min=1000,$max=5000),
        'tipo' => $faker->randomElement($tipo),
        'fecha_inicio_arriendo' => $fecha_in,
        'hora_inicio_arriendo' => $faker->time($format = 'H:i:s', $max = 'now'),
        'fecha_fin_arriendo' => $fecha_out,
        'hora_fin_arriendo' => $faker->time($format = 'H:i:s', $max = 'now'),
        'capacidad' => rand(1, 6),
        'precio_dia' => rand(20000, 70000),
    ];
});

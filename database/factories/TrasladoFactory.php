<?php

use Faker\Generator as Faker;

$factory->define(App\Traslado::class, function (Faker $faker) {
	$ciudades = App\Destino::pluck('ciudad')->toArray();
	$ciudad = $faker->randomElement($ciudades);
	$id_ciudad = App\Destino::where('ciudad', $ciudad)->get(['id_destino'])->first();
    $fecha_in = $faker->dateTimeBetween($min = 'now', $max = '+4 week');
    $hoteles = App\Hotel::where('id_ciudad', $id_ciudad->id_destino)->pluck('nombre')->toArray();
    $aeropuertos = App\Aeropuerto::where('ciudad_aeropuerto', $ciudad)->pluck('nombre_aeropuerto')->toArray();
    return [
    	'id_vehiculo' => $faker->numberBetween($min=1,$max=10),
    	'fecha_traslado' => $fecha_in->format('Y-m-d'),
    	'tipo' => $faker->numberBetween($min=1,$max=2),
    	'nombre_hotel' => $faker->randomElement($hoteles),
    	'nombre_aeropuerto' => $faker->randomElement($aeropuertos),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Traslado::class, function (Faker $faker) {
	$ciudades = App\Destino::pluck('ciudad')->toArray();
	$ciudad = $faker->randomElement($ciudades);
	$id_ciudad = App\Destino::where('ciudad', $ciudad)->get(['id_destino'])->first();
    $fecha_in = $faker->dateTimeBetween($min = 'now', $max = '+4 week');
    $hoteles = App\Hotel::where('id_ciudad', $id_ciudad->id_destino)->pluck('nombre')->toArray();
    $companias = App\Compania::where('id_ciudad', $id_ciudad->id_destino)->pluck('id_compania')->toArray();
    $compania = $faker->randomElement($companias);
    $autos = App\Vehiculo::where('id_compania', $compania)->pluck('id_vehiculo')->toArray();
    $aeropuertos = App\Aeropuerto::where('ciudad_aeropuerto', $ciudad)->pluck('nombre_aeropuerto')->toArray();
    return [
    	'id_vehiculo' => $faker->randomElement($autos),
    	'tipo' => $faker->numberBetween($min=1,$max=2),
    	'nombre_hotel' => $faker->randomElement($hoteles),
    	'nombre_aeropuerto' => $faker->randomElement($aeropuertos),
    ];
});

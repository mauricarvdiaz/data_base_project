<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
	$correos = DB::table('users')->pluck('email')->toArray(); //obteniendo los correos de los usuarios

    return [
        'id_reserva' => $faker->unique()->numberBetween(1, 1000),
        'correo' => $faker->randomElement($correos),
        'detalle' => $faker->text(200),
        'monto_reserva' => $faker->numberBetween(20000,100000),
        'fecha_reserva' => $faker->date(),
        'hora_reserva' => $faker->time()
    ];
});

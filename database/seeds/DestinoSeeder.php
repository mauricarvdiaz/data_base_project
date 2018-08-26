<?php

use Illuminate\Database\Seeder;

class DestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Destino::class, 20)->create();/*
        factory(App\Destino::class, 20)->create()->each(function ($destino){
        	$destino->hoteles()->saveMany(factory(App\Hotel::class, 20)->make());
        	$destino->aeropuertos()->saveMany(factory(App\Aeropuerto::class, 20)->make());
        	$destino->companias()->saveMany(factory(App\Compania::class, 20)->make());
        	$destino->actividades()->saveMany(factory(App\Actividad::class, 20)->make());
        });*/
    }
}

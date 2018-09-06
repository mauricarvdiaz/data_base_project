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

        factory(App\Destino::class, 20)->create()->each(function ($destino){
            $destino->hoteles()->saveMany(factory(App\Hotel::class, 10)->create()->each(function ($hotel){
                $hotel->habitaciones()->saveMany(factory(App\Habitacion::class, 10)->make());
            }));
            $destino->companias()->saveMany(factory(App\Compania::class, 10)->create()->each(function ($companias){
                $companias->vehiculos()->saveMany(factory(App\Vehiculo::class, 10)->make());
            }));
            $destino->actividades()->saveMany(factory(App\Actividad::class, 20)->make());
        });

    }
}

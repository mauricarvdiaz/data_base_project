<?php

use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Compania::class, 5)->create();

        factory(App\Compania::class, 5)->create()->each(function ($hotel){
          $hotel->vehiculos()->saveMany(factory(App\Vehiculo::class, 10)->make());
        });
    }
}

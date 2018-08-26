<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Hotel::class, 20)->create()->each(function ($hotel){
          $hotel->habitaciones()->saveMany(factory(App\Habitacion::class, 20)->make());
        });
        //factory('App\Hotel', 10)->create();
    }
}

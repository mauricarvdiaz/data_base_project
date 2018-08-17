<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Se llama a los seeder
        $this->call(HotelSeeder::class);
        $this->call(ActividadSeeder::class);
    }
}

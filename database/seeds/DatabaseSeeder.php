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
        $this->call(UsersTableSeeder::class);
        $this->call(AeropuertoSeeder::class);
        $this->call(VueloSeeder::class);
    	   //$this->call(VehiculoSeeder::class);
        $this->call(CompaniaSeeder::class);
        //$this->call(UsersTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
    }
}

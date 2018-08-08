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
        //$this->call(UsersTableSeeder::class);
        $this->call(HotelSeeder::class);
        //$this->call(HabitacionSeeder::class);
    }
}

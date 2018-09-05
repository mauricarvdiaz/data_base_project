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
        $this->call(DestinoSeeder::class);
        $this->call(DestinoSeeder::class);
        $this->call(AeropuertoSeeder::class);
        $this->call(VueloSeeder::class);
        $this->call(TrasladoSeeder::class);
    }
}

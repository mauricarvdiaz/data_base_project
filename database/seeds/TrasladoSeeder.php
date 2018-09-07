<?php

use Illuminate\Database\Seeder;

class TrasladoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Traslado::class, 20)->create();
    }
}

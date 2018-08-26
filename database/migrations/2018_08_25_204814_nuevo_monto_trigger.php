<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NuevoMontoTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION monto_trigger()
            RETURNS TRIGGER AS 
            $$
            BEGIN
                UPDATE users SET fondo_usuario = fondo_usuario - NEW.monto_reserva 
                WHERE users.email = NEW.correo;
                RETURN NULL;
            END;
            $$
            LANGUAGE plpgsql;

            CREATE TRIGGER nuevo_monto_trigger
            AFTER INSERT ON reserva
            FOR EACH ROW EXECUTE PROCEDURE monto_trigger();
        ');   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

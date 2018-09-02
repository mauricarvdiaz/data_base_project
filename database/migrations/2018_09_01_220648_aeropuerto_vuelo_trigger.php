<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeropuertoVueloTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION tablaint()
            RETURNS TRIGGER AS 
            $$
            DECLARE
                id_aero1 int;
                id_aero2 int;
            BEGIN
                id_aero1 = (
                    SELECT a.id_aeropuerto 
                    from aeropuerto a
                    where a.ciudad_aeropuerto = NEW.origen 
                    limit 1);
                id_aero2 = (
                    SELECT a.id_aeropuerto
                    from aeropuerto a, vuelo v
                    where a.ciudad_aeropuerto = NEW.destino 
                    limit 1);
                INSERT INTO aeropuerto_vuelo (nro_vuelo, aeropuerto_id)
                VALUES (NEW.nro_vuelo, id_aero1);
                INSERT INTO aeropuerto_vuelo (nro_vuelo, aeropuerto_id)
                VALUES (NEW.nro_vuelo, id_aero2);
                RETURN NULL;
            END;
            $$
            LANGUAGE plpgsql;

            CREATE TRIGGER insertar
            AFTER INSERT ON vuelo
            FOR EACH ROW EXECUTE PROCEDURE tablaint();
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

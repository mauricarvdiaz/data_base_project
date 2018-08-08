<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = "habitacion";
    //campos permitidos.
    protected $fillable = ['nro_habitacion', 'rut_hotel', 'precio_noche', 'fecha_entrada', 'fecha_salida', 'capacidad'];

    //Relacion muchos a uno con Hotel.
    public function hotel(){
      return $this->belongsTo(Hotel::class);
    }

    public function reservas(){
        return $this->belongsToMany(Reserva::class);
    }

    public function paquetes(){
        return $this->belongsToMany(Paquete::class);
    }
}

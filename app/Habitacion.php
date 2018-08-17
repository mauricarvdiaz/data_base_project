<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = "habitacion";
    protected $primaryKey = "id_habitacion";
    //campos permitidos.
    protected $fillable = [
        'id_habitacion', 'nro_habitacion', 'rut_hotel', 'precio_noche', 'fecha_entrada', 'fecha_salida', 'capacidad', 'tipo'
    ];

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

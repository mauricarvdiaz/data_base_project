<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'rut_hotel';
    protected $table = "hotel";
    protected $fillable = ['rut_hotel', 'nombre', 'ciudad_hotel', 'nro_calle_hotel', 'precio_minimo', 'calle_hotel'];

    //Relacion mucho a uno con Habitacion.
    public function habitaciones(){
      return $this->hasMany(Habitacion::class);
    }
}

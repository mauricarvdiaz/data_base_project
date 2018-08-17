<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
  //
  protected $primaryKey = "id_reserva";
  protected $table = "reserva";
  protected $fillable = [
    'correo', 'detalle', 'fecha_reserva', 'hora_reserva'
  ];

  //Relacion muchos a uno con Users.
  public function usuario(){
    return $this->belongsTo(Usuario::class);
  }
  
  public function actividades(){
    return $this->belongsToMany(Actividad::class);
  }

  public function habitaciones(){
    return $this->belongsToMany(Habitacion::class);
  }

  public function traslados(){
    return $this->belongsToMany(Traslado::class);
  }

  public function vehiculos(){
    return $this->belongsToMany(Vehiculo::class);
  }

  public function vuelos(){
    return $this->belongsToMany(Vuelo::class);
  }
}

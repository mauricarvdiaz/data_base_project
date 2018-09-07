<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    //
    protected $table = "traslado";
    protected $primaryKey = "id_traslado";
    protected $fillable = [
      'tipo', 'nombre_hotel', 'nombre_aeropuerto', 'id_vehiculo'
    ];

    public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}

	public function vehiculos(){
		return $this->hasMany(Vehiculo::class);
	}

}

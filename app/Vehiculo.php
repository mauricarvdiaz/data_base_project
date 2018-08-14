<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $table = "vehiculo";
    protected $primaryKey = "patente";

    //Relacion muchos a uno con Compañia.
    public function compania(){
      return $this->belongsTo(Compania::class);
    }

 	public function paquetes(){
		return $this->belongsToMany(Paquete::class);
	}

	public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}

	public function traslados(){
		return $this->belongsToMany(Traslado::class);
	}
}

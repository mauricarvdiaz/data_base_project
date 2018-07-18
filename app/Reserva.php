<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $primaryKey = "id_reserva";
	protected $table = "reserva";
    //Relacion muchos a uno con Users.
    public function usuario(){
      return $this->belongsTo('App\Usuario');
    }
	
	public function actividad(){
		return $this->belongsToMany('App\Actividad');
	}

	public function habitacion(){
		return $this->belongsToMany('App\Habitacion');
	}

	public function traslado(){
		return $this->belongsToMany('App\Traslado');
	}

	public function vehiculo(){
		return $this->belongsToMany('App\Vehiculo');
	}

	public function vuelo(){
		return $this->belongsToMany('App\Vuelo');
	}
}

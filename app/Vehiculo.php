<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $table = "vehiculo";
    protected $primaryKey = "id_vehiculo";
    protected $fillable = [
      'patente', 'tipo', 'fecha_inicio_arriendo', 'fecha_fin_arriendo', 'capacidad', 'hora_inicio_arriendo', 'hora_fin_arriendo', 'precio_dia'
    ];

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
		return $this->belongsTo(Traslado::class);
	}
}

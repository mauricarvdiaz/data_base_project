<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = "actividad";
    protected $primaryKey = "id_actividad";
    protected $fillable = [
    	'ubicacion', 'tipo_actividad', 'fecha', 'descripcion', 'nro_menores_edad', 'nro_mayores_edad', 'precio_actividad'
    ];

    public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}
}

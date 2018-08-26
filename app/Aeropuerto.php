<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    //
    protected $table = "aeropuerto";
    protected $primaryKey = "id_aeropuerto";
    protected $fillable = [
      'calle_aeropuerto', 'nro_calle_aeropuerto', 'ciudad_aeropuerto', 'nombre_aeropuerto'
    ];

    public function vuelos(){
		return $this->belongsToMany(Vuelo::class);
	}

	public function destino(){
        return $this->belongsTo(Destino::class);
    }
}

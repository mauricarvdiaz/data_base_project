<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = "destinos";
    protected $primaryKey = "id_destino";
    protected $fillable = [
    	'id_destino', 'ciudad', 'pais'
    ];

    public function hoteles(){
    	return $this->hasMany(Hotel::class, 'id_ciudad');
    }

    public function companias(){
    	return $this->hasMany(Compania::class, 'id_ciudad');
    }

    public function actividades(){
    	return $this->hasMany(Actividad::class, 'id_ciudad');
    }
}

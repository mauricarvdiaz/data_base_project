<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    //
    protected $table = "compania";
    protected $primaryKey = "id_compania";
    protected $fillable = [
    	'compania', 'calle_compania', 'nro_calle_compania', 'ciudad_compania', 'nombre_compania'
    ];

    //Relacion uno a muchos con Vehiculos.
    public function vehiculos(){
      return $this->hasMany(Vehiculo::class, 'id_compania');
    }

    public function destino(){
        return $this->belongsTo(Destino::class);
    }
}

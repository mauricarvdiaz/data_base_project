<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'rut_hotel';
    protected $table = "hotel";
    protected $fillable = ['rut_hotel', 'nombre', 'id_ciudad', 'nro_calle_hotel', 'calle_hotel'];

    //Relacion uno a mucho con Habitacion.
    public function habitaciones(){
      return $this->hasMany(Habitacion::class, 'rut_hotel');
    }

    public function destino(){
        return $this->belongsTo(Destino::class);
    }
}

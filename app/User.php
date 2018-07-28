<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $primaryKey = 'correo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_usuario', 'correo', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relacion mucho a uno con Reserva.
    public function reserva(){
      return $this->hasMany('App\Reserva');
    }

    //Relacion muchos a uno con Historial.
    public function historial(){
      return $this->belongsTo('App\Historial');
    }
}

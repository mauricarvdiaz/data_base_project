<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;
use DateTime;

class CarritoController extends Controller
{
	//Constructor
	public function __construct()
	{
		//Si no existe carrito se crea.
		if(!\Session::has('carrito')) \Session::put('carrito', array("habitacion" => array(), "actividad" => array(), "vuelo" => array(), "vehiculo" => array(), "paquete" => array()));
	}
    //Mostrar carrito
	public function show()
	{
		$carrito = \Session::get('carrito');
		$total = $this->total();
		return view('carrito')->with('carrito', $carrito)->with('total', $total);
	}
    //Agregar al carrito
	public function agregar_habitacion($id_habitacion, $fecha_in, $fecha_out)
	{
		$hab = Habitacion::find($id_habitacion);
		$habitacion_reservar = new Habitacion();
		$fecha_entrada = new DateTime($fecha_in);
		$fecha_salida = new DateTime($fecha_out);
		$habitacion_reservar->nro_habitacion = $hab->nro_habitacion;
		$habitacion_reservar->rut_hotel = $hab->rut_hotel;
		$habitacion_reservar->capacidad = $hab->capacidad;
		$habitacion_reservar->precio_noche = $hab->precio_noche;
		$habitacion_reservar->tipo = $hab->tipo;
		$habitacion_reservar->fecha_entrada = $fecha_entrada->format('Y-m-d');
		$habitacion_reservar->fecha_salida = $fecha_salida->format('Y-m-d');
		$carrito = \Session::get('carrito');
		//$carrito['habitacion'] = $habitacion_reservar;
		array_push($carrito['habitacion'], $habitacion_reservar);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}
	//Funciones para agregar al carro actividades, vehiculos y lo que sea xd

    //Borrar
	public function borrar($llave, $posicion)
	{
		$carrito = \Session::get('carrito');
		unset($carrito[$llave][$posicion]);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}
    //Actualizar

    //Vaciar
	public function vaciar()
	{
		\Session::forget('carrito');
		return redirect()->route('carrito-compras');
	}

    //Total
    private function total()
    {
    	$carrito = \Session::get('carrito');
    	$total = 0;
    	foreach ($carrito as $llave => $productos) {
    		if($llave == 'habitacion'){
    			foreach ($productos as $habitacion) {
    				$fecha_entrada = new DateTime($habitacion->fecha_entrada);
        			$fecha_salida = new DateTime($habitacion->fecha_salida);
        			$noches_alojamiento = $fecha_entrada->diff($fecha_salida);
        			$noches = data_get($noches_alojamiento, 'days');
        			$total += $noches * $habitacion->precio_noche;
    			}
    		}
    		//Agregar los demas
    		else if($llave == 'actividad'){

    		}
    	}
    	return $total;
    }
}

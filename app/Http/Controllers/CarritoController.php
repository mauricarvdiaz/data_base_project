<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;
use App\Actividad;
use App\Vuelo;
use App\Vehiculo;
use DateTime;


class CarritoController extends Controller
{
	//Constructor
	public function __construct()
	{
		//Si no existe carrito se crea.
		if(!\Session::has('carrito')) \Session::put('carrito', array("habitacion" => array(), "actividad" => array(), "vuelo" => array(), "vehiculo" => array(),"traslado" => array(), "paquete" => array()));
	}
    //Mostrar carrito
	public function show()
	{
		$carrito = \Session::get('carrito');
		$subtotal = $this->total();
		$total = 0;
		foreach ($subtotal as $subtotalProducto) {
			$total += array_sum($subtotalProducto);
		}
		return view('carrito')->with('carrito', $carrito)->with('total', $total)->with('subtotal', $subtotal);
	}
	public function agregar_traslado($id_vehiculo,$datestart,$numPasajeros){
		$carrito = \Session::get('carrito');
		$vehiculo = Vehiculo::find($id_vehiculo);
		$traslado = new Vehiculo();

		$traslado->patente = $vehiculo->patente;
		$traslado->id_compania = $vehiculo->id_compania;
		$traslado->tipo = $vehiculo->tipo;
		$traslado->fecha_inicio_arriendo = $vehiculo->fecha_inicio_arriendo;
		$traslado->fecha_fin_arriendo = $vehiculo->fecha_inicio_arriendo;
		$traslado->hora_inicio_arriendo = $vehiculo->hora_inicio_arriendo;
		$traslado->hora_fin_arriendo = $vehiculo->hora_fin_arriendo;
		$traslado->capacidad= $numPasajeros;
		$decimales = ($vehiculo->precio_dia / 12 ) * $numPasajeros;
        $traslado->precio_dia = floor($decimales);
		array_push($carrito['traslado'], $traslado);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');

	}

	//Agregar auto al carrito
	public function agregar_auto($id_vehiculo, $fecha_in, $fecha_out, $hora_in, $hora_out)
	{
		$carrito = \Session::get('carrito');
		$auto = Vehiculo::find($id_vehiculo);
		$auto_reservar= new Vehiculo();
		$fecha_entrada = new DateTime($fecha_in);
		$fecha_salida = new DateTime($fecha_out);
		$hora_entrada = new DateTime($hora_in);
		$hora_salida = new DateTime($hora_out);
		$auto_reservar->patente = $auto->patente;
		$auto_reservar->id_compania = $auto->id_compania;
		$auto_reservar->tipo = $auto->tipo;
		$auto_reservar->capacidad = $auto->capacidad;
		$auto_reservar->precio_dia = $auto->precio_dia;
		$auto_reservar->fecha_inicio_arriendo = $fecha_entrada->format('Y-m-d');
		$auto_reservar->fecha_fin_arriendo = $fecha_salida->format('Y-m-d');
		$auto_reservar->hora_inicio_arriendo = $hora_entrada->format('H:i:s');
		$auto_reservar->hora_fin_arriendo = $hora_salida->format('H:i:s');
		array_push($carrito['vehiculo'], $auto_reservar);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}

    //Agregar al carrito
	public function agregar_habitacion($id_habitacion, $id_habitacion2, $fecha_in, $fecha_out)
	{
		$carrito = \Session::get('carrito');
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
		array_push($carrito['habitacion'], $habitacion_reservar);
		if($id_habitacion2 != 0){
			$hab2 = Habitacion::find($id_habitacion2);
			$habitacion2_reservar = new Habitacion();
			$habitacion2_reservar->nro_habitacion = $hab2->nro_habitacion;
			$habitacion2_reservar->rut_hotel = $hab2->rut_hotel;
			$habitacion2_reservar->capacidad = $hab2->capacidad;
			$habitacion2_reservar->precio_noche = $hab2->precio_noche;
			$habitacion2_reservar->tipo = $hab2->tipo;
			$habitacion2_reservar->fecha_entrada = $fecha_entrada->format('Y-m-d');
			$habitacion2_reservar->fecha_salida = $fecha_salida->format('Y-m-d');
			array_push($carrito['habitacion'], $habitacion2_reservar);
		}
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}

	public function agregar_vuelo_paquete($nro_vuelo, $claseVuelo, $cantidad_viajeros, $tipoVuelo)
    {
        $carrito = \Session::get('carrito');
        $vue = Vuelo::find($nro_vuelo);
		$vuelo_reservar = new Vuelo();
		$vuelo_reservar->nro_vuelo = $vue->nro_vuelo;
		$vuelo_reservar->origen = $vue->origen;
		$vuelo_reservar->destino = $vue->destino;
		$vuelo_reservar->fecha_salida = $vue->fecha_salida;
		$vuelo_reservar->fecha_llegada = $vue->fecha_llegada;
		$vuelo_reservar->hora_salida = $vue->hora_salida;
		$vuelo_reservar->hora_llegada = $vue->hora_llegada;
		$vuelo_reservar->aerolinea = $vue->aerolinea;
		$vuelo_reservar->nro_escala = $vue->nro_escala;
		$vuelo_reservar->cantidad_equipaje = $vue->cantidad_equipaje;
		if ($claseVuelo == 'Economica'){
			$vuelo_reservar->cantidad_turista = $cantidad_viajeros;
			$vuelo_reservar->cantidad_ejecutivo = 0;
			$vuelo_reservar->cantidad_primera_clase = 0;
			$vuelo_reservar->precio_vuelo = $vue->precio_vuelo;
		}
		else if($claseVuelo == 'Ejecutiva'){
			$vuelo_reservar->cantidad_turista = 0;
			$vuelo_reservar->cantidad_ejecutivo = $cantidad_viajeros;
			$vuelo_reservar->cantidad_primera_clase = 0;
			$decimales = $vue->precio_vuelo + ($vue->precio_vuelo * 0.3);
			$vuelo_reservar->precio_vuelo = floor($decimales);
		}
		else{
			$vuelo_reservar->cantidad_primera_clase = $cantidad_viajeros;
			$vuelo_reservar->cantidad_ejecutivo = 0;
			$vuelo_reservar->cantidad_turista = 0;
			$decimales = $vue->precio_vuelo + ($vue->precio_vuelo * 0.5);
			$vuelo_reservar->precio_vuelo = floor($decimales);
		}
		array_push($carrito['paquete'], $vuelo_reservar);
		\Session::put('carrito', $carrito);
		return back();
    }

	public function agregar_vuelo($nro_vuelo, $claseVuelo, $cantidad_viajeros, $tipoVuelo)
	{
		$carrito = \Session::get('carrito');
		$vue = Vuelo::find($nro_vuelo);
		$vuelo_reservar = new Vuelo();
		$vuelo_reservar->nro_vuelo = $vue->nro_vuelo;
		$vuelo_reservar->origen = $vue->origen;
		$vuelo_reservar->destino = $vue->destino;
		$vuelo_reservar->fecha_salida = $vue->fecha_salida;
		$vuelo_reservar->fecha_llegada = $vue->fecha_llegada;
		$vuelo_reservar->hora_salida = $vue->hora_salida;
		$vuelo_reservar->hora_llegada = $vue->hora_llegada;
		$vuelo_reservar->aerolinea = $vue->aerolinea;
		$vuelo_reservar->nro_escala = $vue->nro_escala;
		$vuelo_reservar->cantidad_equipaje = $vue->cantidad_equipaje;
		if ($claseVuelo == 'Economica'){
			$vuelo_reservar->cantidad_turista = $cantidad_viajeros;
			$vuelo_reservar->cantidad_ejecutivo = 0;
			$vuelo_reservar->cantidad_primera_clase = 0;
			$vuelo_reservar->precio_vuelo = $vue->precio_vuelo;
		}
		else if($claseVuelo == 'Ejecutiva'){
			$vuelo_reservar->cantidad_turista = 0;
			$vuelo_reservar->cantidad_ejecutivo = $cantidad_viajeros;
			$vuelo_reservar->cantidad_primera_clase = 0;
			$decimales = $vue->precio_vuelo + ($vue->precio_vuelo * 0.3);
			$vuelo_reservar->precio_vuelo = floor($decimales);

		}
		else{
			$vuelo_reservar->cantidad_primera_clase = $cantidad_viajeros;
			$vuelo_reservar->cantidad_ejecutivo = 0;
			$vuelo_reservar->cantidad_turista = 0;
			$decimales = $vue->precio_vuelo + ($vue->precio_vuelo * 0.5);
			$vuelo_reservar->precio_vuelo = floor($decimales);

		}
		if ($tipoVuelo == 2){
			array_push($carrito['vuelo'], $vuelo_reservar);
			\Session::put('carrito', $carrito);
			return redirect()->route('carrito-compras');

		}
		if ($tipoVuelo == 1){
			array_push($carrito['vuelo'], $vuelo_reservar);
			\Session::put('carrito', $carrito);
			return back();

		}
		if ($tipoVuelo == 3){
			array_push($carrito['vuelo'], $vuelo_reservar);
			\Session::put('carrito', $carrito);
			return back();

		}

	}
	
	//Funciones para agregar al carro actividades, vehiculos y lo que sea xd
	public function agregar_actividad($id_actividad, Request $request)
	{
		$carrito = \Session::get('carrito');
		$actividad = Actividad::find($id_actividad);
		$actividad_nueva = new Actividad();
		if($actividad->fecha == $request->fecha){
			$actividad_nueva->id_actividad = $id_actividad;
		}

		$actividad_nueva->id_ciudad = $actividad->id_ciudad;
		$actividad_nueva->tipo_actividad = $actividad->tipo_actividad;
		$actividad_nueva->fecha = $request->fecha;
		$actividad_nueva->precio_actividad = $actividad->precio_actividad;
		$actividad_nueva->descripcion = $actividad->descripcion;
		$actividad_nueva->nro_menores_edad = $request->menores;
		$actividad_nueva->nro_mayores_edad = $request->adultos;
		array_push($carrito['actividad'], $actividad_nueva);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}

    //Borrar
	public function borrar($llave, $posicion)
	{
		$carrito = \Session::get('carrito');
		unset($carrito[$llave][$posicion]);
		\Session::put('carrito', $carrito);
		return redirect()->route('carrito-compras');
	}

    //Vaciar
	public function vaciar()
	{
		\Session::forget('carrito');
		return redirect()->route('carrito-compras');
	}

	public function detalle_orden()
	{
		$carrito = \Session::get('carrito');
		$subtotal = $this->total();
		$total = 0;
		foreach ($subtotal as $subtotalProducto) {
			$total += array_sum($subtotalProducto);
		}
		\Session::put('subtotal', $subtotal);
		return view('detalle_compra', compact('carrito', 'total', 'subtotal'));
	}

    //Total
    private function total()
    {
    	$carrito = \Session::get('carrito');
    	$subtotal = array("habitacion" => array(), "actividad" => array(), "vuelo" => array(), "vehiculo" => array(), "traslado" => array(),"paquete" => array());
    	//$total = 0;
    	foreach ($carrito as $llave => $productos) {
    		if($llave == 'habitacion'){
    			$i = 0;
    			foreach ($productos as $habitacion) {
    				$fecha_entrada = new DateTime($habitacion->fecha_entrada);
        			$fecha_salida = new DateTime($habitacion->fecha_salida);
        			$noches_alojamiento = $fecha_entrada->diff($fecha_salida);
        			$noches = data_get($noches_alojamiento, 'days');
        			$sub = $noches * $habitacion->precio_noche;
        			array_push($subtotal[$llave], $sub);
        			$i++;
    			}
    		}
    		else if ($llave == 'vehiculo') {
    			foreach ($productos as $auto) {
    				$fecha_entrada = new DateTime($auto->fecha_inicio_arriendo);
    				$fecha_salida = new DateTime($auto->fecha_fin_arriendo);
    				$dias_arriendo = $fecha_entrada->diff($fecha_salida);
    				$dias = data_get($dias_arriendo, 'days');
    				$sub = $dias * $auto->precio_dia;
    				array_push($subtotal[$llave], $sub);
    			}
    		}
    		else if($llave == 'actividad'){
    			$i = 0;
    			foreach ($productos as $actividad) {
    				$sub = $actividad->precio_actividad * ($actividad->nro_menores_edad + $actividad->nro_mayores_edad);
    				array_push($subtotal[$llave], $sub);
    				$i++;
    			}
    		}
    		else if($llave == 'traslado'){
    			$i = 0;
    			foreach ($productos as $traslado) {
    				$sub = $traslado->precio_dia * $traslado->capacidad;
    				array_push($subtotal[$llave], $sub);
    				$i++;
    			}
    		}
    		
    		else if($llave == 'vuelo'){
    			$i = 0;
    			foreach ($productos as $vuelo) {
    				$sub = $vuelo->precio_vuelo * ($vuelo->cantidad_turista + $vuelo->cantidad_ejecutivo + $vuelo->cantidad_primera_clase);
    				array_push($subtotal[$llave], $sub);
    				$i++;
    			}
    		}


    		else if($llave == 'paquete'){

    		}
    	}
    	return $subtotal;
    }
}

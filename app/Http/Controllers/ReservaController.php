<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nueva_reserva = new Reserva($request->all());
        $nueva_reserva->save();
    }

    public function reservar_habitacion()
    {
        $carrito = \Session::get('carrito');
        $subtotal = \Session::get('subtotal');
        foreach ($carrito as $key => $producto) {
            if($key == "habitacion" && count($producto) > 0)
            {
                $i = 0;
                foreach ($producto as $habitacion) {
                    $reserva = new Reserva();
                    $reserva->id_usuario = Auth::user()->id;
                    $reserva->detalle = "Se ha realizado la reserva de la habitacion N° " . $habitacion->nro_habitacion . " con fecha de entrada " . $habitacion->fecha_entrada . " y fecha de salida " . $habitacion->fecha_salida;
                    $reserva->monto_reserva = $subtotal[$key][$i];
                    $reserva->fecha_reserva = date('Y-m-d');
                    $reserva->hora_reserva = date('H:i:s');
                    $reserva->save();
                    $i++;
                }
            }
            elseif($key == "actividad" && count($producto) > 0)
            {
                $i = 0;
                foreach ($producto as $actividad) {
                    $reserva = new Reserva();
                    $reserva->id_usuario = Auth::user()->id;
                    $reserva->detalle = "Se ha realizado la reserva de la actividad " . $actividad->tipo_actividad . " con fecha de realización " . $actividad->fecha;
                    $reserva->monto_reserva = $subtotal[$key][$i];
                    $reserva->fecha_reserva = date('Y-m-d');
                    $reserva->hora_reserva = date('H:i:s');
                    $reserva->save();
                    $i++;
                }
            }
            elseif($key == "vuelo" && count($producto) > 0)
            {
                $i = 0;
                foreach ($producto as $vuelo) {
                    $reserva = new Reserva();
                    $reserva->id_usuario = Auth::user()->id;
                    $reserva->detalle = "Se ha realizado la reserva del vuelo " . $vuelo->nro_vuelo . " con fecha de viaje " . $vuelo->fecha_salida;
                    $reserva->monto_reserva = $subtotal[$key][$i];
                    $reserva->fecha_reserva = date('Y-m-d');
                    $reserva->hora_reserva = date('H:i:s');
                    $reserva->save();
                    $i++;
                }
            }
             elseif($key == "vehiculo" && count($producto) > 0)
            {
                $i = 0;
                foreach ($producto as $vehiculo) {
                    $reserva = new Reserva();
                    $reserva->id_usuario = Auth::user()->id;
                    $reserva->detalle = "Se ha realizado la reserva del vehiculo con patente " . $vehiculo->patente . " con fecha y hora de retiro " . $vehiculo->fecha_inicio_arriendo . " " . $vehiculo->hora_inicio_arriendo . " hasta " . $vehiculo->fecha_fin_arriendo . " " . $vehiculo->hora_fin_arriendo;
                    $reserva->monto_reserva = $subtotal[$key][$i];
                    $reserva->fecha_reserva = date('Y-m-d');
                    $reserva->hora_reserva = date('H:i:s');
                    $reserva->save();
                    $i++;
                }
            }

        }
        \Session::forget('carrito');
        $ruta = "reserva/" . Auth::user()->id;
        return redirect($ruta);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservas = Reserva::where('id_usuario', $id)->get();
        return view('reserva')->with('reservas', $reservas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

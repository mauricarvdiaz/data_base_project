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
                    $reserva->detalle = "Se ha realizado una reserva de habitacion";
                    $reserva->monto_reserva = $subtotal[$key][$i];
                    $reserva->fecha_reserva = date('Y-m-d');
                    $reserva->hora_reserva = date('H:i:s');
                    $reserva->save();
                    $i++;
                }
            }
        }
        return redirect('/alojamientos');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

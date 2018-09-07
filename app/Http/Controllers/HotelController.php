<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Habitacion;
use App\Destino;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Session;

class HotelController extends Controller
{
    public function alojamientos()
    {
      return view('hotel');
    }

    /**
     * Display a listing of the resource.
     * Mostar los hoteles
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hotel::paginate(8);
        return view('admin.alojamientos.hoteles')
          ->with('hoteles', $hoteles);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.alojamientosAdmin');
    }
    
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //Validacion de los datos de entrada.
        $validateData = $request->validate([
            'destino' => 'required',
            'fecha_entrada' => 'required|date', //|after:tomorrow ??
            'fecha_salida' => 'required|date|after:fecha_entrada', //|after:tomorrow ??
            'adultos_hab1' => 'numeric|required|min:1'
        ]);
        
        $capacidad_hab1 = $request->adultos_hab1 + $request->menores_hab1;
        $capacidad_hab2 = $request->adultos_hab2 + $request->menores_hab2;
        
        $ciudad = Destino::where('ciudad', $request->destino)->first();
        if($ciudad != Null){
          $hoteles = $ciudad->hoteles()->get();
        }
        else{
          $hoteles = collect();
        }
        
        
        //Contar la cantidad de habitaciones por hotel para dejar las habitaciones que tienen habitaciones disponibles.
        return view('seleccion.hoteles')->with('hoteles', $hoteles)->with('capa1', $capacidad_hab1)->with('capa2', $capacidad_hab2)
          ->with('fecha_in', $request->fecha_entrada)->with('fecha_out', $request->fecha_salida);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rut_hotel)
    {
        $hotel = Hotel::find($rut_hotel);
        return view('admin.alojamientos.editar')->with('hotel', $hotel);
    }

    //Funcion para el administrador
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rut_hotel)
    {
        Hotel::find($rut_hotel)->update($request->all());
        return redirect()->route('hoteles.index');
    }

    //Funcion para el administrador
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rut)
    {
        Hotel::where('rut_hotel', $rut)->delete();
        return back();
    }

    //Funcion para el administrador.
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel($request->all());
        $hotel->save();
        Session::flash('mensaje', 'Se ha guardado el hotel');
        return back();
    }
}



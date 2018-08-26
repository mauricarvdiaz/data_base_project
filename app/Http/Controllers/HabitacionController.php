<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;
use DateTime;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaiones = Habiacion::all();
        return $habitaciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro.add_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacion = new Habitacion($request->all());
        $habitacion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rut_hotel)
    {
        
    }

    public  function buscar_habitaciones($rut_hotel, $fecha_in, $fecha_out, $hab_1, $hab_2){
        $fecha_entrada = new DateTime($fecha_in);
        $fecha_salida = new DateTime($fecha_out);
        $noches_alojamiento = $fecha_entrada->diff($fecha_salida);
        $noches = data_get($noches_alojamiento, 'days');
        $opciones = 1;
        $habitaciones = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $hab_1)
            ->where(function ($query) use ($fecha_in, $fecha_out){
                $query->where('fecha_salida', '<', $fecha_in)->orWhere('fecha_entrada', '>', $fecha_out);
            })->get()->unique('tipo');
        //Segunda habitacion
        if($hab_2 > 0){
            $opciones = 2;
            $habitaciones_2 = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $hab_2)
            ->where(function ($query) use ($fecha_in, $fecha_out){
                $query->where('fecha_salida', '<', $fecha_in)->orWhere('fecha_entrada', '>', $fecha_out);
            })->get()->unique('tipo');
            foreach ($habitaciones_2 as $hab) {
                $habitaciones->push($hab);   
            }
        }
        //2 habitaciones con igual capacidad
        if($hab_1 == $hab_2){
            $opciones = 3;
            $habitaciones = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $hab_1)
            ->where(function ($query) use ($fecha_in, $fecha_out){
                $query->where('fecha_salida', '<', $fecha_in)->orWhere('fecha_entrada', '>', $fecha_out);
            })->get();
            dd($habitaciones);
            //Otro return
        }

        return view('seleccion.habitaciones')->with('habitaciones', $habitaciones)->with('opciones', $opciones)->with('noches', $noches)->with('in', $fecha_in)->with('out', $fecha_out);
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
    public function update(Request $request, $id_habitacion)
    {
        Habitacion::find($id_habitacion)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Habitacion::where('id_habitacion', $id)->delete();
    }
}

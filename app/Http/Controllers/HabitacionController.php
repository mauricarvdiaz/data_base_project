<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;

class HabitacionController extends Controller
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
        //
    }

    public function mostrar_habitaciones($rut_hotel, $capa1, $noches, $capa2, $capa3){
        //Se busca en la base de datos las habitaciones del hotel con la capacidad buscada por el usuario.
        $habitaciones_capa1 = Habitacion::where('rut_hotel', $rut_hotel)
        ->where('capacidad', $capa1)
        ->orderBy('precio_noche', 'ASC')
        ->get(); 
        $habitacion1 = $habitaciones_capa1->unique('tipo');

        if($capa2 > 0){
            $habitaciones_capa2 = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $capa2)
            ->orderBy('precio_noche', 'ASC')
            ->get();
            $habitacion2 = $habitaciones_capa2->unique('tipo');
        }
        if($capa3 > 0){
            $habitaciones_capa3 = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $capa3)
            ->orderBy('precio_noche', 'ASC')
            ->get();
            $habitacion3 = $habitaciones_capa3->unique('tipo');
        }

        if($capa2 == 0 && capa3 == 0){
            return view('seleccion.habitaciones')->with('habitaciones', $habitacion1)->with('capa1', $capa1)->with('noches', $noches);
        }
        else if($capa2 > 0 && capa3 == 0){
            


            return view('seleccion.habitaciones')->with('habitaciones', $habitacion1)
            ->with('capa1', $capa1)
            ->with('capa2', $capa2)
            ->with('noches', $noches);
        }
        else{
            return view('seleccion.habitaciones')->with('habitaciones', $habitacion1)
            ->with('capa1', $capa1)
            ->with('capa2', $capa2)
            ->with('capa3', $capa3)
            ->with('noches', $noches);
        }
        

        //Se llama a la vista.
    /*
        return view('seleccion.habitaciones')->with('hab_1', $habitaciones_capa1)
        ->with('hab_2', $habitaciones_capa2)->with('hab_3', $habitaciones_capa3)
        ->with('capa1', $capa1)->with('capa2', $capa2)->with('capa3', $capa3)
        ->with('noches', $noches);*/
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
        //
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

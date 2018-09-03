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

    public function reservar()
    {
        $carrito = \Session::get('carrito');
        $subtotal = \Session::get('subtotal');
        foreach ($carrito as $key => $habitaciones) {
            if($key == "habitacion" && count($habitaciones) > 0){
                foreach ($habitaciones as $habitacion) {
                    $habitacion->save();
                }
            }
        }
        return redirect('actividades/reserva');
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
        $habitaciones_1 = Habitacion::where('rut_hotel', $rut_hotel)
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
            $habitaciones = $this->agrupar_habitaciones_distintas($habitaciones_1, $habitaciones_2);
            
            return view('seleccion.habitaciones')->with('habitaciones', $habitaciones)->with('opciones', $opciones)->with('noches', $noches)->with('in', $fecha_in)->with('out', $fecha_out);
        }
        //2 habitaciones con igual capacidad
        if($hab_1 == $hab_2){
            $opciones = 3;
            $habitaciones_1 = Habitacion::where('rut_hotel', $rut_hotel)
            ->where('capacidad', $hab_1)
            ->where(function ($query) use ($fecha_in, $fecha_out){
                $query->where('fecha_salida', '<', $fecha_in)->orWhere('fecha_entrada', '>', $fecha_out);
            })->get();
            $habitaciones = $this->agrupar_habitaciones_iguales($habitaciones_1);
            //dd($habitaciones);
            //echo $habitaciones[0][0]['tipo'];
            return view('seleccion.habitaciones')->with('habitaciones', $habitaciones)->with('opciones', $opciones)->with('noches', $noches)->with('in', $fecha_in)->with('out', $fecha_out);
        }
     
        return view('seleccion.habitaciones')->with('habitaciones', $habitaciones_1)->with('opciones', $opciones)->with('noches', $noches)->with('in', $fecha_in)->with('out', $fecha_out);
    }

    private function agrupar_habitaciones_distintas($habitaciones_1, $habitaciones_2)
    {
        $hab1 = $habitaciones_1->groupBy('tipo')->toArray();
        $hab2 = $habitaciones_2->groupBy('tipo')->toArray();
        $grupo_final = array();
        foreach ($hab1 as $habitaciones) {
            foreach ($hab2 as $habitaciones2) {
                $par_hab = array();
                array_push($par_hab, $habitaciones[0]);
                array_push($par_hab, $habitaciones2[0]);
                array_push($grupo_final, $par_hab);
            }
        }
        return $grupo_final;
    }

    private function agrupar_habitaciones_iguales($habitaciones)
    {
        $grouped = $habitaciones->groupBy('tipo');
        $grupo = $grouped->toArray();
        $grupo1 = array();
        $grupo2 = array();
        $grupo3 = array();
        $grupo_final = array();
        foreach ($grupo as $key => $habitaciones) {
            if($key == 1){
                $grupo1 = $habitaciones;
            }
            else if($key == 2){
                $grupo2 = $habitaciones;
            }
            else{
                $grupo3 = $habitaciones;
            }
        }       
        $cantidad1 = count($grupo1);
        $cantidad2 = count($grupo2);
        $cantidad3 = count($grupo3);
        if($cantidad1 != 0 && $cantidad2 != 0 && $cantidad3 != 0){
            if($cantidad1 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo1[0]);
                array_push($par_hab, $grupo1[1]);
                array_push($grupo_final, $par_hab);
            }
            if($cantidad2 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo2[0]);
                array_push($par_hab, $grupo2[1]);
                array_push($grupo_final, $par_hab);
            }
            if($cantidad3 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo3[0]);
                array_push($par_hab, $grupo3[1]);
                array_push($grupo_final, $par_hab);
            }
            $par_hab = array();
            array_push($par_hab, $grupo1[0]);
            array_push($par_hab, $grupo2[0]);
            array_push($grupo_final, $par_hab);
            $par_hab = array();
            array_push($par_hab, $grupo1[0]);
            array_push($par_hab, $grupo3[0]);
            array_push($grupo_final, $par_hab);
            $par_hab = array();
            array_push($par_hab, $grupo2[0]);
            array_push($par_hab, $grupo3[0]);
            array_push($grupo_final, $par_hab);
        }
        else if($cantidad1 != 0 && $cantidad2 != 0 && $cantidad3 == 0){
            if($cantidad1 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo1[0]);
                array_push($par_hab, $grupo1[1]);
                array_push($grupo_final, $par_hab);
            }
            if($cantidad2 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo2[0]);
                array_push($par_hab, $grupo2[1]);
                array_push($grupo_final, $par_hab);
            }
            $par_hab = array();
            array_push($par_hab, $grupo1[0]);
            array_push($par_hab, $grupo2[0]);
            array_push($grupo_final, $par_hab);
        }
        else if($cantidad1 != 0 && $cantidad2 == 0 && $cantidad3 != 0){
            if($cantidad1 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo1[0]);
                array_push($par_hab, $grupo1[1]);
                array_push($grupo_final, $par_hab);
            }
            if($cantidad3 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo3[0]);
                array_push($par_hab, $grupo3[1]);
                array_push($grupo_final, $par_hab);
            }
            $par_hab = array();
            array_push($par_hab, $grupo1[0]);
            array_push($par_hab, $grupo3[0]);
            array_push($grupo_final, $par_hab);
        }
        else if($cantidad1 == 0 && $cantidad2 != 0 && $cantidad3 != 0){
            if($cantidad2 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo2[0]);
                array_push($par_hab, $grupo2[1]);
                array_push($grupo_final, $par_hab);
            }
            if($cantidad3 >= 2){
                $par_hab = array();
                array_push($par_hab, $grupo3[0]);
                array_push($par_hab, $grupo3[1]);
                array_push($grupo_final, $par_hab);
            }
            $par_hab = array();
            array_push($par_hab, $grupo2[0]);
            array_push($par_hab, $grupo3[0]);
            array_push($grupo_final, $par_hab);
        }        
        return $grupo_final;
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

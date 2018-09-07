<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelo;
use App\Aeropuerto;

class VueloController extends Controller
{
    public function vuelos(){
        return view('vuelos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function reservar()
    {
        $carrito = \Session::get('carrito');
        $subtotal = \Session::get('subtotal');
        foreach ($carrito as $key => $vuelos) {
            if($key == "vuelo" && count($vuelos) > 0){
                foreach ($vuelos as $vuelo) {
                     $vuelo2 = Vuelo::find($vuelo->nro_vuelo);
                        $cantidad_turista= $vuelo2->cantidad_turista+ $vuelo->cantidad_turista;
                        $cantidad_ejecutivo= $vuelo2->cantidad_ejecutivo+ $vuelo->cantidad_ejecutivo;
                        $cantidad_primera_clase= $vuelo2->cantidad_primera_clase+ $vuelo->cantidad_primera_clase;
                        Vuelo::where('nro_vuelo', $vuelo2->nro_vuelo)->update(['cantidad_turista' =>$cantidad_turista, 'cantidad_ejecutivo' => $cantidad_ejecutivo,  'cantidad_primera_clase' => $cantidad_primera_clase]);
                }
            }
        }
       // return redirect('/reservar/habitacion');
        return redirect('vehiculo/reserva');
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
        $vuelo = new Vuelo($request->all());
        $vuelo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //return $request;

        //Solo ida
        if($request->radio == 2){
            if ($request->claseVuelo == "Economica") {
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
            }
            else if ($request->claseVuelo == "Primera Clase") {
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                foreach ($vuelos as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                    $v->precio_vuelo = floor($decimales);
                }
            }
            else{
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                foreach ($vuelos as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                    $v->precio_vuelo = floor($decimales);
                }
                

            }
            $aero1 = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
            $aero2 = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
            return view('seleccion.vuelosdisponibles1')->with('vuelosEncontrados', $vuelos)->with('aeropuertoOrigen', $aero1)->with('aeropuertoDestino', $aero2)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros',$request->nroAdultos + $request->nroMenores)->with('tipoVuelo',$request->radio);
        }

        //Ida y vuelta
        else if($request->radio == 1){
            if ($request->claseVuelo == "Economica") {
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();



            }
            else if ($request->claseVuelo == "Primera Clase") {
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();
                foreach ($vuelosIda as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                    $v->precio_vuelo = floor($decimales);
                }
                foreach ($vuelosRegreso as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                    $v->precio_vuelo = floor($decimales);
                }
            }
            else{
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();
                foreach ($vuelosIda as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                    $v->precio_vuelo = floor($decimales);
                }
                foreach ($vuelosRegreso as $v ) {
                    $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                    $v->precio_vuelo = floor($decimales);
                }
            }
            $aero1 = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
            $aero2 = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
            return view('seleccion.vuelosdisponibles2')->with('vuelosIda', $vuelosIda)->with('vuelosRegreso', $vuelosRegreso)->with('aeropuertoOrigen', $aero1)->with('aeropuertoDestino', $aero2)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros',$request->nroAdultos + $request->nroMenores)->with('tipoVuelo',$request->radio)->with('tipoVuelo',$request->radio);

        }

        //Multiples destinos
        else if($request->radio == 3){
            if (isset($request->origen) && isset($request->origen1) && isset($request->origen2) && isset($request->origen3)) {
                if($request->claseVuelo == "Economica"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $tramo4 = Vuelo::where('destino', $request->destino3)->where('origen', $request->origen3)->where('fecha_salida', $request->datestart3)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $aero4O = Aeropuerto::where('ciudad_aeropuerto', $request->origen3)->get();
                    $aero4D = Aeropuerto::where('ciudad_aeropuerto', $request->destino3)->get();
                    $nroTramos = 4;
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('tramo4', $tramo4)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('aero4O', $aero4O)->with('aero4D', $aero4D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
                elseif($request->claseVuelo == "Primera Clase"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $tramo4 = Vuelo::where('destino', $request->destino3)->where('origen', $request->origen3)->where('fecha_salida', $request->datestart3)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $aero4O = Aeropuerto::where('ciudad_aeropuerto', $request->origen3)->get();
                    $aero4D = Aeropuerto::where('ciudad_aeropuerto', $request->destino3)->get();
                    $nroTramos = 4;
                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }

                    foreach ($tramo3 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo4 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('tramo4', $tramo4)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('aero4O', $aero4O)->with('aero4D', $aero4D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);

                }
                else{
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $tramo4 = Vuelo::where('destino', $request->destino3)->where('origen', $request->origen3)->where('fecha_salida', $request->datestart3)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $aero4O = Aeropuerto::where('ciudad_aeropuerto', $request->origen3)->get();
                    $aero4D = Aeropuerto::where('ciudad_aeropuerto', $request->destino3)->get();
                    $nroTramos = 4;
                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }

                    foreach ($tramo3 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo4 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('tramo4', $tramo4)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('aero4O', $aero4O)->with('aero4D', $aero4D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
            }
            else if (isset($request->origen) && isset($request->origen1) && isset($request->origen2)) {
                if($request->claseVuelo == "Economica"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $nroTramos = 3;
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
                if($request->claseVuelo == "Primera Clase"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $nroTramos = 3;

                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }

                    foreach ($tramo3 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
                else{
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $tramo3 = Vuelo::where('destino', $request->destino2)->where('origen', $request->origen2)->where('fecha_salida', $request->datestart2)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $aero3O = Aeropuerto::where('ciudad_aeropuerto', $request->origen2)->get();
                    $aero3D = Aeropuerto::where('ciudad_aeropuerto', $request->destino2)->get();
                    $nroTramos = 3;

                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }

                    foreach ($tramo3 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('tramo3', $tramo3)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('aero3O', $aero3O)->with('aero3D', $aero3D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
            }
            else {
                if ($request->claseVuelo == "Economica"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $nroTramos = 2;
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
                elseif  ($request->claseVuelo == "Primera Clase"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $nroTramos = 2;
                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.5);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }
                elseif  ($request->claseVuelo == "Ejecutivo"){
                    $tramo1 = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                    $tramo2 = Vuelo::where('destino', $request->destino1)->where('origen', $request->origen1)->where('fecha_salida', $request->datestart1)->get();
                    $aero1O = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
                    $aero1D = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
                    $aero2O = Aeropuerto::where('ciudad_aeropuerto', $request->origen1)->get();
                    $aero2D = Aeropuerto::where('ciudad_aeropuerto', $request->destino1)->get();
                    $nroTramos = 2;
                    foreach ($tramo1 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    foreach ($tramo2 as $v ) {
                        $decimales = $v->precio_vuelo + ($v->precio_vuelo * 0.3);
                        $v->precio_vuelo = floor($decimales);
                    }
                    return view('seleccion.vuelosdisponibles3')->with('tramo1', $tramo1)->with('tramo2', $tramo2)->with('aero1O', $aero1O)->with('aero1D', $aero1D)->with('aero2O', $aero2O)->with('aero2D', $aero2D)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros', $request->nroAdultos + $request->nroMenores)->with('nroTramos', $nroTramos)->with('tipoVuelo',$request->radio);
                }

            }
        }
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
    public function update(Request $request, $nro_vuelo)
    {
        $vuelo = Vuelo::find($nro_vuelo);
        //Clase Turista
        if($request->tipo == 1){
            $capacidad_clase_turista = $vuelo->cantidad_turista - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_turista' => $capacidad_clase_turista]);
        }
        //Clase Ejecutivo
        else if ($request->tipo == 2) {
            $capacidad_clase_ejecutivo = $vuelo->cantidad_ejecutivo - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_ejecutivo' => $capacidad_clase_ejecutivo]);
        }
        //Primera Clase
        else if ($request->tipo == 3) {
            $capacidad_primera_clase = $vuelo->cantidad_primera_clase - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_primera_clase' => $capacidad_primera_clase]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nro_vuelo)
    {
        Vuelo::where('nro_vuelo', $nro_vuelo)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Habitacion;
use DB;
use DateTime;

class HotelController extends Controller
{
    public function alojamientos()
    {
        return view('alojamientos');
    }

    /**
     * Display a listing of the resource.
     * Mostar los hoteles
     * @return \Illuminate\Http\Response
     */
    public function index($destino)
    {
        echo $destino;
        $hoteles = Hotel::all();
        //return $hoteles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.add_data');
    }

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
    }
    /*
    public function buscar_hoteles($destino, $in, $out, $adu1, $men1, $adu2, $men2)
    {
      //Se obtienen todas las habitaciones
      /*$habitaciones_1 = Habitacion::where('capacidad', $cantidadh1)->orWhere('capacidad', $cantidadh2)->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);
      //Se obtienen las habitaciones no disponibles.
      
      $habitaciones_no_disp= Habitacion::where('fecha_entrada', '<=', $fecha_out)
        ->where('fecha_salida', '>=', $fecha_in)
        ->where(function ($query) use ($cantidadh1,$cantidadh2){
          $query->where('capacidad', $cantidadh1)->orWhere('capacidad', $cantidadh2);
        })
        ->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);  

      //Se quitan las habitaciones no disponibles. ($habitaciones_1 - $habitaciones_no_disp)
      $hab_disp_1 = collect();
      foreach ($habitaciones_1 as $hd) {
        foreach ($habitaciones_no_disp as $hnd) {
          if(!($hd->rut_hotel == $hnd->rut_hotel && $hd->nro_habitacion == $hnd->nro_habitacion)){
            $hab_disp_1->push($hd);
          }
        }
      }
      //Se quitan las habitaciones que se repiten
      $unique = $hab_disp_1->unique(function ($item){
        return $item['nro_habitacion'].$item['rut_hotel'];
      });
      //Se agrupan las habitaciones por hotel.
      $hab_disp_2 = $unique->groupBy('rut_hotel');
      //Se cuenta si la cantidad de habitaciones por hotel concuerda con lo pedido.
      foreach ($hab_disp_2 as $habitaciones_hotel) {
        //Se buscan 2 habitaciones
        if($habitaciones_hotel->count() >= 2 && ($cantidadh2 > 0)){

        }
        //Se busca 1 habitacion
        else if($habitaciones_hotel->count() >= 1 && ($cantidadh2 == 0)){

        }
      }
      
      //Se calcula la cantidad de personas que compartiran una habitacion.
      $cantidadh1 = $adu1 + $men1;
      $cantidadh2 = $adu2 + $men2;
      $fecha_in = new DateTime($in);
      $fecha_out = new DateTime($out);
      //Se obtienen todos los hoteles del destino
      $hoteles_1 = Hotel::where('ciudad_hotel', $destino)->get();
      $habitaciones_1 = Habitacion::where('capacidad', $cantidadh1)->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);
      $habitaciones_2 = Habitacion::where('capacidad', $cantidadh2)->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);  
      //Habitaciones no disponibles
      $habitaciones_no_disp_1 = Habitacion::where('fecha_entrada', '<=', $fecha_out)
        ->where('fecha_salida', '>=', $fecha_in)
        ->where('capacidad', $cantidadh1)
        ->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']); 

      //Habitaciones no disponibles
      $habitaciones_no_disp_2 = Habitacion::where('fecha_entrada', '<=', $fecha_out)
        ->where('fecha_salida', '>=', $fecha_in)
        ->where('capacidad', $cantidadh2)
        ->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']); 

      //Se quitan las habitaciones no disponibles. ($habitaciones_1 - $habitaciones_no_disp)
      $hab_disp_1 = collect();
      if($habitaciones_no_disp_1->count() != 0){
        foreach ($habitaciones_1 as $hd) {
          foreach ($habitaciones_no_disp_1 as $hnd) {
            if(!($hd->rut_hotel == $hnd->rut_hotel && $hd->nro_habitacion == $hnd->nro_habitacion)){
              $hab_disp_1->push($hd);
            }
          }
        }
      }
      else{
        $hab_disp_1 = $habitaciones_1;
      }
      
      $hab_disp_2 = collect();
      if($habitaciones_no_disp_2->count() != 0){
        foreach ($habitaciones_2 as $hd) {
          foreach ($habitaciones_no_disp_2 as $hnd) {
            if(!($hd->rut_hotel == $hnd->rut_hotel && $hd->nro_habitacion == $hnd->nro_habitacion)){
              $hab_disp_2->push($hd);
            }
          }
        }
      }
      else{
        $hab_disp_2 = $habitaciones_2;
      }
      
      //Se quitan las habitaciones que se repiten
      $unique_1 = $hab_disp_1->unique(function ($item){
        return $item['nro_habitacion'].$item['rut_hotel'];
      });
      //Se agrupan las habitaciones por hotel.
      //$habdisp_1 = $unique_1->groupBy('rut_hotel');

      //Se quitan las habitaciones que se repiten
      $unique_2 = $hab_disp_2->unique(function ($item){
        return $item['nro_habitacion'].$item['rut_hotel'];
      });
      //Se agrupan las habitaciones por hotel.
      //$habdisp_2 = $unique_2->groupBy('rut_hotel');
      
      //Buscar los rut_hotel que este tanto en $habdisp_1 como en $habdisp_2
      $rut_1 = collect();
      foreach ($unique_1 as $habitacion) {
        $rut_1->push($habitacion->rut_hotel);
      }
      $rut_2 = collect();
      foreach ($unique_1 as $habitacion) {
        $rut_1->push($habitacion->rut_hotel);
      }
      return $rut_1;
      //Seguir trabajand
    }
    */
    
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //Se calcula la cantidad de personas que compartiran una habitacion.
      $destino = $request->destino;
      $cantidadh1 = $request->adultosh1 + $request->menoresh1;
      $cantidadh2 = $request->adultosh2 + $request->menoresh2;
      $fecha_in = new DateTime($request->fecha_entrada);
      $fecha_out = new DateTime($request->fecha_salida);
      //Se obtienen todos los hoteles del destino
      $hoteles_1 = Hotel::where('ciudad_hotel', $destino)->get();
      //Se obtienen las habitaciones por capacidad.
      $habitaciones_1 = Habitacion::where('capacidad', $cantidadh1)->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);
      $habitaciones_2 = Habitacion::where('capacidad', $cantidadh2)->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']);  
      //Se obtienen las habitaciones no disponibles por fecha.
      $habitaciones_no_disp_1 = Habitacion::where('fecha_entrada', '<=', $fecha_out)
        ->where('fecha_salida', '>=', $fecha_in)
        ->where('capacidad', $cantidadh1)
        ->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']); 

      //Habitaciones no disponibles
      $habitaciones_no_disp_2 = Habitacion::where('fecha_entrada', '<=', $fecha_out)
        ->where('fecha_salida', '>=', $fecha_in)
        ->where('capacidad', $cantidadh2)
        ->get(['rut_hotel', 'nro_habitacion', 'capacidad', 'precio_noche', 'tipo']); 

      //Se quitan las habitaciones no disponibles. ($habitaciones_1 - $habitaciones_no_disp)
      $hab_disp_1 = collect();
      if($habitaciones_no_disp_1->count() != 0){
        foreach ($habitaciones_1 as $hd) {
          foreach ($habitaciones_no_disp_1 as $hnd) {
            if(!($hd->rut_hotel == $hnd->rut_hotel && $hd->nro_habitacion == $hnd->nro_habitacion)){
              $hab_disp_1->push($hd);
            }
          }
        }
      }
      else{
        $hab_disp_1 = $habitaciones_1;
      }
      
      $hab_disp_2 = collect();
      if($habitaciones_no_disp_2->count() != 0){
        foreach ($habitaciones_2 as $hd) {
          foreach ($habitaciones_no_disp_2 as $hnd) {
            if(!($hd->rut_hotel == $hnd->rut_hotel && $hd->nro_habitacion == $hnd->nro_habitacion)){
              $hab_disp_2->push($hd);
            }
          }
        }
      }
      else{
        $hab_disp_2 = $habitaciones_2;
      }
      
      //Se quitan las habitaciones que se repiten
      $unique_1 = $hab_disp_1->unique(function ($item){
        return $item['nro_habitacion'].$item['rut_hotel'];
      });
      //Se agrupan las habitaciones por hotel.
      //$habdisp_1 = $unique_1->groupBy('rut_hotel');

      //Se quitan las habitaciones que se repiten
      $unique_2 = $hab_disp_2->unique(function ($item){
        return $item['nro_habitacion'].$item['rut_hotel'];
      });
      //Se agrupan las habitaciones por hotel.
      //$habdisp_2 = $unique_2->groupBy('rut_hotel');
      //Buscar los rut_hotel que este tanto en $habdisp_1 como en $habdisp_2
      $rut_1 = collect();
      foreach ($unique_1 as $habitacion) {
        $rut_1->push($habitacion->rut_hotel);
      }
      $rut_2 = collect();
      foreach ($unique_1 as $habitacion) {
        $rut_1->push($habitacion->rut_hotel);
      }
      $diff = $rut_1->diff($rut_2);
      $rut_hoteles = $diff->unique();
      $hoteles = $hoteles_1->whereIn('rut_hotel', $rut_hoteles);
      return $hoteles;
      //Seguir trabajando
      
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
        return view('edit.edit_hotel')->with('hotel', $hotel);
    }

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rut)
    {
        Hotel::where('rut_hotel', $rut)->delete();
    }
}

/*
//Se realizan las consulta a la base de datos de acuerdo a lo ingresado por el usuario. Obteniendo los hoteles que coincidan con el destino, fechas y habitaciones.
//Consulta para la habitacion 1
$consulta_hoteles_h1 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
    ->where('hotel.ciudad_hotel', $request->destino)
    ->where('habitacion.capacidad', $cantidadh1)
    ->where(function ($query) use ($request){
        $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
    })
    ->orderBy('hotel.precio_minimo', 'ASC')
    ->get();
    $hotelesh1 = $consulta_hoteles_h1->unique('nombre'); //Coleccion hoteles h1
//Estan disponibles la cantidad de habitaciones en un mismo hotel.
$hoteles_h1 = collect();
if($cantidadh1 == $cantidadh2){
    foreach ($hotelesh1 as $hotel) {
        # code...
        $cant = 0;
        foreach ($consulta_hoteles_h1 as $ht) {
            # code...
            $comp = strcmp($hotel->nombre, $ht->nombre);
            if($comp == 0){
                $cant++;
            }
        }
        if(($cantidadh3 != $cantidadh2 && $cant >= 2) || ($cantidadh3 == $cantidadh2 && $cant >= 3)){
            $hoteles_h1->push($hotel);
        }
    }
}
//Consulta para la habitacion 2
if($cantidadh2 > 0 && $cantidadh2 != $cantidadh1){
    $consulta_hoteles_h2 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
    ->where('hotel.ciudad_hotel', $request->destino)
    ->where('habitacion.capacidad', $cantidadh2)
    ->where(function ($query) use ($request, $cantidadh2){
        $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
    })
    ->orderBy('hotel.precio_minimo', 'ASC')
    ->get();
    $hoteles_h2 = $consulta_hoteles_h2->unique('nombre'); //Coleccion hoteles h2
    //Se crea una coleccion con los hoteles que tienen las habitaciones disponibles.
    $hoteles = collect();
    foreach ($hoteles_h1 as $hotel_h1) {
        foreach ($hoteles_h2 as $hotel_h2) {
            if($hotel_h2->nombre == $hotel_h1->nombre){
                $hoteles->push($hotel_h1);
            }
        }
    }
}
//Consulta para la habitacion 3
if($cantidadh3 > 0 && $cantidadh3 != $cantidadh2){
    $consulta_hoteles_h3 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
    ->where('hotel.ciudad_hotel', $request->destino)
    ->where('habitacion.capacidad', $cantidadh3)
    ->where(function ($query) use ($request){
        $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
    })
    ->orderBy('hotel.precio_minimo', 'ASC')
    ->get();
    $hoteles_h3 = $consulta_hoteles_h3->unique('nombre'); //Coleccion hoteles h3
    $hoteles_aux = collect();
    foreach ($hoteles as $hotel) {
        foreach ($hoteles_h3 as $hotel_h3) {
            if($hotel->nombre == $hotel_h3->nombre){
                $hoteles_aux->push($hotel_h3);
            }
        }
    }
    $hoteles = $hoteles_aux;
}

$info = array('noches' => $noches, 'capa1' => $cantidadh1, 'capa2' => $cantidadh2, 'capa3' => $cantidadh3);
//Se llama a la vista que mostrara los hoteles al usuario.
if(($cantidadh1 > 0 && $cantidadh2 == 0 && $cantidadh3 == 0) || ($cantidadh1 == $cantidadh2)){
    dd($hotelesh1);
    //return view('seleccion.hoteles')->with('hoteles', $hotelesh1)->with('info', $info);
}
else if($cantidadh1 == $cantidadh2){
  //return view('seleccion.hoteles')->with('hoteles', $hoteles_h1)->with('info', $info);
}
else{
  dd($hoteles);
    //return view('seleccion.hoteles')->with('hoteles', $hoteles)->with('info', $info);
}

public function show(Request $request)
    {
        //Validacion de los datos de entrada.
        $validateData = $request->validate([
            'destino' => 'required',
            'fecha_entrada' => 'required|date', //|after:tomorrow ??
            'fecha_salida' => 'required|date|after:fecha_entrada', //|after:tomorrow ??
            'adultosh1' => 'numeric|required|min:1'
        ]);

        //Se calcula la cantidad de personas que compartiran una habitacion.
        $cantidadh1 = $request->adultosh1 + $request->menoresh1;
        $cantidadh2 = $request->adultosh2 + $request->menoresh2;
        $cantidadh3 = $request->adultosh3 + $request->menoresh3;
        $cantidad = $cantidadh1 + $cantidadh2 + $cantidadh3;
        if($cantidadh3 > 0 || $cantidadh2 > 0){
            if($cantidadh3 > 0 && $cantidadh2 == 0){
                $cantidadh2 = $cantidadh3;
                $cantidadh3 = 0;
            }
            if($cantidadh3 == $cantidadh1 && $cantidadh2 > 0){
                $aux = $cantidadh2;
                $cantidadh2 = $cantidadh3;
                $cantidadh3 = $aux;
            }
        }
        //Se calculan las noches de alojamiento de acuerdo a las fechas de entrada y salida.
        $fecha_in = new DateTime($request->fecha_entrada);
        $fecha_out = new DateTime($request->fecha_salida);
        $noches_alojamiento = $fecha_in->diff($fecha_out);
        $noches = data_get($noches_alojamiento, 'days');
        
        //Se obtienen todos los hoteles
        $hoteles_1 = DB::table('hotel')
          ->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
          ->where('hotel.ciudad_hotel', $request->destino)
          ->where(function ($query) use ($cantidadh1,$cantidadh2,$cantidadh3){
              $query->where('habitacion.capacidad', $cantidadh1)->orWhere('habitacion.capacidad', $cantidadh2)->orWhere('habitacion.capacidad', $cantidadh3);
          })
          ->select('hotel.*', 'habitacion.nro_habitacion', 'habitacion.capacidad', 'habitacion.precio_noche', 'habitacion.tipo')
          ->get()
          ->unique();
        //Se obtienen los hoteles que no tienen habitaciones disponibles.
        $hoteles_2 = DB::table('hotel')
          ->join('habitacion', 'hotel.rut_hotel', '=', 'habitacion.rut_hotel')
          ->where('hotel.ciudad_hotel', $request->destino)
          ->where('fecha_entrada', '<=', $request->fecha_salida)
          ->where('fecha_salida', '>=', $request->fecha_entrada)
          ->where(function ($query) use ($cantidadh1,$cantidadh2,$cantidadh3){
              $query->where('capacidad', $cantidadh1)->orWhere('capacidad', $cantidadh2)->orWhere('capacidad', $cantidadh3);
          })
          ->select('hotel.*', 'habitacion.nro_habitacion', 'habitacion.capacidad', 'habitacion.precio_noche', 'habitacion.tipo')
          ->get();
        //Se quitan de $hoteles_1 los hoteles de $hoteles_2
        $hoteles_3 = collect();
        foreach ($hoteles_1 as $hotel) {
          if($hoteles_2->contains($hotel) == false){
            $hoteles_3->push($hotel);
          }
        }
        //Quitar hoteles que no tangan todas las habitaciones necesarias disponibles
        //--Se quitan los hoteles que no tengan las dos habitaciones solicitadas (con igual capacidad)
        $hoteles = collect();
        if($cantidadh1 == $cantidadh2 && $cantidadh1 != $cantidadh3){
          $grouped = $hoteles_3->groupBy('rut_hotel');
          foreach ($grouped as $group) {
            if($group->count() >= 2){
              $hoteles->push($group);
            }
          }
        }
        //--Se quitan los hoteles que no tengan las tres habitaciones solicitadas (con igual capacidad)
        else if($cantidadh1 == $cantidadh2 && $cantidadh1 == $cantidadh3){
          $grouped = $hoteles_3->groupBy('rut_hotel');
          foreach ($grouped as $group) {
            if($group->count() >= 3){
              $hoteles->push($group);
            }
          }
        }
        //--Se quitan los hoteles que no tengan las tres habitaciones solicitadas (con distinta capacidad)
        else{
          $grouped = $hoteles_3->groupBy('rut_hotel');
          foreach ($grouped as $group) {
            if($group->count() >= 3){
              $hoteles->push($group);
            }
          }
        }
        return $hoteles;
        //return view('seleccion.hoteles')->with('hoteles', $hoteles);
    }
*/

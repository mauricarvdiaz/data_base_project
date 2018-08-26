@extends('layouts.plantilla')
@section('titulo', 'Habitaciones')

@section('contenido')
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container" style="margin-top: -200px">
          <table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Tipo de habitacion</th>
                <th scope="col" align="center">Capacidad</th>
                <th scope="col" align="center">Precio por noche</th>
                <th scope="col" align="center">Detalle de la reserva</th>
              </tr>
            </thead>
            <tbody>
                <!--Solo una habitacion-->
                @if($opciones == 1)
                  @foreach($habitaciones as $habitacion)
                    <tr>
                      <td>
                        @if($habitacion->tipo === 1)
                          <b>Habitacion con cama individual</b> <br>
                          @elseif($habitacion->tipo === 2)
                            <b>Habitacion con cama doble</b> <br>
                          @else
                            <b>Habitacion con cama individual y doble</b> <br>
                        @endif
                            Wi-Fi gratis <br>
                            Tv de pantalla plana / LCD / Plasma
                            Aire acondicionado Calefaccion <br>
                            Minibar en la habitación
                      </td>
                      <td align="center">{{ $habitacion->capacidad }}</td>
                      <td align="center">{{ $habitacion->precio_noche }}</td>
                      <td align="center">
                        Precio por <?php echo $noches ?> noches para {{$habitacion->capacidad}} personas <br> $ <?php echo $noches * $habitacion->precio_noche ?> <br>
                        <a href="/carrito/agregar/habitacion/{{$habitacion->id_habitacion}}/{{$in}}/{{$out}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Añadir al carrito</a>
                      </td>
                    </tr>
                  @endforeach
                <!--Dos habitaciones distinta capacidad-->
                @elseif($opciones == 2)
                  <p>Hola 2</p>

                <!--Dos habitaciones igual capacidad-->
                @else
                  <p>Hola 3</p>
                @endif
            </tbody>
          </table>
          <!--
          <div class="row" style="margin-top: -170px">
            <div class="">
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                  <div class="col">
                    
                  </div>
                  <div class="col">
                    
                    <a href="" class="btn btn-primary" style="">Reservar</a>
                  </div>
                </li>
            </ul>
          </div>   -->
        </div>
      </div>
    </div>
@endsection
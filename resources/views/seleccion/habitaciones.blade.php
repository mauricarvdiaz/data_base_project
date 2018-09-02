@extends('layouts.plantilla')
@section('titulo', 'Habitaciones')

@section('contenido')
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container" style="margin-top: -200px">
          @if(count($habitaciones) > 0)
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
                          <b>Habitacion economica</b> <br>
                          @elseif($habitacion->tipo === 2)
                            <b>Habitacion standar</b> <br>
                          @else
                            <b>Habitacion full</b> <br>
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
                        <a href="/carrito/agregar/habitacion/{{$habitacion->id_habitacion}}/0/{{$in}}/{{$out}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Añadir al carrito</a>
                      </td>
                    </tr>
                  @endforeach
                <!--Dos habitaciones distinta capacidad-->
                @elseif($opciones == 2)
                  @foreach($habitaciones as $habitacion)
                    <tr>
                      <td>
                        @if($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 1)
                          <b>2 habitaciones economicas</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 2)
                            <b>1 habitacion standar y 1 economica</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 3)
                            <b>1 Habitacion economica y 1 full</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 2)
                            <b>2 Habitaciones standar</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 3)                          
                            <b>1 Habitacion standar y 1 full</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 3)
                            <b>2 Habitaciones full</b> <br>
                        @endif
                            Wi-Fi gratis <br>
                            Tv de pantalla plana / LCD / Plasma
                            Aire acondicionado Calefaccion <br>
                            Minibar en la habitación
                      </td>
                      <td align="center">
                         @if($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 1)
                            <b>economica: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>economica: {{ $habitacion[1]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 2)
                            <b>economica: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>standar: {{ $habitacion[1]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 1)
                            <b>economica: {{ $habitacion[1]['capacidad'] }}</b> <br>
                            <b>standar: {{ $habitacion[0]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 3)
                            <b>economica: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>full: {{ $habitacion[1]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 1)
                            <b>economica: {{ $habitacion[1]['capacidad'] }}</b> <br>
                            <b>full: {{ $habitacion[0]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 2)
                            <b>estandar: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>estandar: {{ $habitacion[1]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 3)   
                            <b>estandar: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>full: {{ $habitacion[1]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 2)   
                            <b>estandar: {{ $habitacion[1]['capacidad'] }}</b> <br>
                            <b>full: {{ $habitacion[0]['capacidad'] }}</b>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 3)
                            <b>full: {{ $habitacion[0]['capacidad'] }}</b> <br>
                            <b>full: {{ $habitacion[1]['capacidad'] }}</b>
                        @endif
                      </td>
                      <td align="center">
                      @if($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 1)
                          <b>economica: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 2)
                            <b>economica: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                            <b>standar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 1)
                            <b>economica: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                            <b>standar: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 3)
                            <b>economica: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                            <b>full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 1)
                            <b>economica: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                            <b>full: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 2)
                            <b>estandar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 3)
                            <b>estandar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                            <b>full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 2)
                            <b>estandar: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                            <b>full: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 3)
                            <b>full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                        @endif
                    </td>
                    <td align="center">
                        Precio por <?php echo $noches ?> noches <br> $ <?php echo ($noches * $habitacion[0]['precio_noche']) + ($noches * $habitacion[1]['precio_noche'])?> <br>
                        <a href="/carrito/agregar/habitacion/{{$habitacion[0]['id_habitacion']}}/{{$habitacion[1]['id_habitacion']}}/{{$in}}/{{$out}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Añadir al carrito</a>
                    </td>
                    </tr>
                  @endforeach
                <!--Dos habitaciones igual capacidad-->
                @else
                @foreach($habitaciones as $habitacion)
                  <tr>
                    <td>
                        @if($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 1)
                          <b>2 habitaciones economicas</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 2)
                            <b>1 habitacion standar y 1 economica</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 3)
                            <b>1 Habitacion economica y 1 full</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 2)
                            <b>2 Habitaciones standar</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 3)                          
                            <b>1 Habitacion standar y 1 full</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 3)
                            <b>2 Habitaciones full</b> <br>
                        @endif
                            Wi-Fi gratis <br>
                            Tv de pantalla plana / LCD / Plasma
                            Aire acondicionado Calefaccion <br>
                            Minibar en la habitación
                    </td>
                    <td align="center">{{ $habitacion[0]['capacidad'] }}</td>
                    <td align="center">
                      @if($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 1)
                          <b>habitacion economica: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 2)
                            <b>habitacion economica: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                            <b>habitacion standar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 1 && $habitacion[1]['tipo'] === 3)
                            <b>habitacion economica: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                            <b>habitacion full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 2)
                            <b>habitacion estandar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 2 && $habitacion[1]['tipo'] === 3)
                            <b>habitacion estandar: {{ $habitacion[0]['precio_noche'] }}</b> <br>
                            <b>habitacion full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                          @elseif($habitacion[0]['tipo'] === 3 && $habitacion[1]['tipo'] === 3)
                            <b>habitacion full: {{ $habitacion[1]['precio_noche'] }}</b> <br>
                        @endif
                    </td>
                    <td align="center">
                        Precio por <?php echo $noches ?> noches <br> $ <?php echo ($noches * $habitacion[0]['precio_noche']) + ($noches * $habitacion[1]['precio_noche'])?> <br>
                        <a href="/carrito/agregar/habitacion/{{$habitacion[0]['id_habitacion']}}/{{$habitacion[1]['id_habitacion']}}/{{$in}}/{{$out}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Añadir al carrito</a>
                    </td>
                  </tr>
                @endforeach
                @endif
            </tbody>
          </table>
          @else
            <h3>
              <span class="label label-warning">No hay habitaciones disponibles :(</span>
            </h3>
          @endif
        </div>
      </div>
    </div>
@endsection
@extends("layouts.plantilla1")
@section('titulo', 'Seleccion habitacion')

@section('buscador')
  <body style="background-color:#78909C;">
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Tipo de habitacion</th>
          <th scope="col" align="center">Capacidad</th>
          <th scope="col" align="center">Precio por noche</th>
          <th scope="col" align="center">Detalle de la reserva</th>
        </tr>
      </thead>
      <tbody>
          @foreach($habitaciones as $habitacion)
            <tr>
              <td> 
                @if($habitacion->tipo === 1)
                  <b>Habitacion con cama de 1 plaza</b> <br>
                  @elseif($habitacion->tipo === 2)
                    <b>Habitacion con cama de 2 plazas</b> <br>
                  @else
                    <b>Habitacion con cama de 1 y 2 plazas</b> <br>
                @endif 
                    Wi-Fi gratis <br>
                    Tv de pantalla plana / LCD / Plasma
                    Aire acondicionado Calefaccion <br>
                    Minibar en la habitación
              </td>
              <td align="center">{{ $habitacion->capacidad }}</td>
              <td align="center">{{ $habitacion->precio_noche }}</td>
              <td align="center"> 
                Precio por <?php echo $noches ?> noches para {{$capa1}} personas <br> $ <?php echo $noches * $habitacion->precio_noche ?> <br>
                <a href="/reserva/alojamientos/{{$habitacion->nro_habitacion}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Reservar</a>
              </td>
            </tr>
          @endforeach
      
      </tbody>
    </table>
    </div>
  </body>
@endsection



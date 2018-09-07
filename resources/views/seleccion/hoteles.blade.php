@extends('layouts.plantilla')
@section('titulo', 'Hoteles')

@section('contenido')
<body style="background-color: #F0B27A">
  <div class="container">
    @if(count($hoteles) > 0)
    <div class="row" style="margin-top: -170px">
            <ul class="list-group">
              @foreach($hoteles as $hotel)
                <li class="list-group-item" style="margin-top: 10px">
                  <div class="col">
                    <h5>{{ $hotel->nombre }}</h5>
                    <h6>Ubicado en {{$hotel->calle_hotel}} numero {{$hotel->nro_calle_hotel}}</h6>
                  </div>
                  <div class="col">
                    <a href="/habitaciones/{{$hotel->rut_hotel}}/{{$fecha_in}}/{{$fecha_out}}/{{$capa1}}/{{$capa2}}" class="btn btn-primary" style="">Ver habitaciones</a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>  
    @else
      <h3>
        <span class="label label-warning">No hay hoteles disponibles </span>
      </h3>
    @endif
  </div>
</body>
@endsection
@extends('layouts.plantilla')
@section('titulo', 'Actividad')

@section('contenido')
<body style="background-color:#F79F81;">
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container" style="margin-top: -200px">
          @if(count($actividades) > 0)
          <h3>Selecciona tu actividad</h3>

          <table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Tipo de actividad</th>
                <th scope="col" align="center">Descripcion</th>
                <th scope="col" align="center">Precio</th>
              </tr>
            </thead>
            <tbody>
              @foreach($actividades as $actividad) 
                <tr>
                  <td align="center"> {{$actividad->tipo_actividad}} </td>
                  <td align="center"> {{$actividad->descripcion}} </td>
                  <td align="center"> {{$actividad->precio_actividad}} <br><br>
                    <a href="/actividad/detalle/{{$actividad->id_actividad}}" class="btn btn-primary btn-sm" style="margin-left: ;margin-top: " >Ver detalle</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table> 
          @else
            <h3>
              <span class="label label-warning">No hay actividades disponibles</span>
            </h3>
          @endif
        </div>
      </div>
    </div>
  </body>
@endsection
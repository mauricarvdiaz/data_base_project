@extends("layouts.plantilla")
@section('titulo', 'Autos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($vehiculos) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Selecciona un vehículo</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
        <thead>
          <tr>
            <th scope="col" align="center">Tipo</th>
            <th scope="col" align="center">Capacidad</th>
            <th scope="col" align="center">Precio</th>
            <th scope="col" align="center">Añadir</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vehiculos as $auto)
          <tr>
            <td align="center"> {{$auto->tipo}} </td>
            <td align="center"> {{$auto->capacidad}}</td>
            <td align="center"> ${{$auto->precio_dia}}</td>
            <td align="center"> 
              <a href="/carrito/agregar/vehiculo/{{$auto->id_vehiculo}}/{{$auto->fecha_inicio_arriendo}}/{{$auto->fecha_fin_arriendo}}/{{$auto->hora_inicio_arriendo}}/{{$auto->hora_fin_arriendo}}" class="btn btn-primary">Añadir al carrito</a>
            </td>
          @endforeach
          </tr>   
        </tbody>
      </table>
    </div>
    @else
      <h3>
        <span class="label label-warning">No hay autos disponibles</span>
      </h3>
    @endif
  </body>     
@endsection
@extends("layouts.plantilla")
@section('titulo', 'Traslado')

@section("contenido")
  <body style="background-color:#AF601A;">
    @if(count($vehiculos) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Traslados Disponibles</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Patente</th>
          <th scope="col" align="center">Tipo</th>
          <th scope="col" align="center">Capacidad</th>
          <th scope="col" align="center">Precio x persona</th>
          <th scope="col" align="center"> </th>
        </tr>
      </thead>
      <tbody>
      @foreach($vehiculos as $auto)
          <tr>
              <td align="center"> {{ $auto->patente }}</td>
              <td align="center"> {{ $auto->tipo }}</td>
              <td align="center"> {{ $auto->capacidad }}</td>
              <td align="center"> ${{$auto->precio_dia}}</td>
              <td align="center">
              <a href="/carrito/agregar/traslado/{{$auto->id_vehiculo}}/{{$datestart}}/{{$numPasajeros}}" class="btn btn-primary btn-sm" style="margin-left: ;margin-top: " >Agregar al carrito</a> </td>
            </tr>
      @endforeach
      </tbody>
</table>

</div>
    @else
      <h3>
        <span class="label label-warning">No hay traslados disponibles</span>
      </h3>
    @endif
  </body>
@endsection
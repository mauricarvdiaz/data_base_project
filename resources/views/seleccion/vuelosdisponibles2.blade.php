@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($vuelosIda) > 0 && count($vuelosRegreso) > 0)
     <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <h3> Selecciona tu vuelo de ida</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Aerolinea</th>
          <th scope="col" align="center">N° vuelo</th>
          <th scope="col" align="center">Hora salida</th>
          <th scope="col" align="center">Hora llegada</th>
          <th scope="col" align="center">N° escalas</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center">Detalles</th>
        </tr>
      </thead>
      <tbody>
      @foreach($vuelosIda as $vuelosi)
          <tr>
              <td align="center"> {{ $vuelosi->aerolinea }}</td>
              <td align="center"> {{ $vuelosi->nro_vuelo }}</td>
              <td align="center"> {{ $vuelosi->hora_salida }}</td>
              <td align="center"> {{ $vuelosi->hora_llegada }} </td>
              <td align="center"> {{ $vuelosi->nro_escala }} </td>
              <td align="center"> {{ $vuelosi->precio_vuelo }} </td>
              <td align="center"> <a href="" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Ver detalles</a> </td>
            </tr>
      @endforeach
      </tbody>
</table>
</div>

 <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <h3> Selecciona tu vuelo de regreso</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Aerolinea</th>
          <th scope="col" align="center">N° vuelo</th>
          <th scope="col" align="center">Hora salida</th>
          <th scope="col" align="center">Hora llegada</th>
          <th scope="col" align="center">N° escalas</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center">Detalles</th>
        </tr>
      </thead>
      <tbody>
      @foreach($vuelosRegreso as $vuelosr)
          <tr>
              <td align="center"> {{ $vuelosr->aerolinea }}</td>
              <td align="center"> {{ $vuelosr->nro_vuelo }}</td>
              <td align="center"> {{ $vuelosr->hora_salida }}</td>
              <td align="center"> {{ $vuelosr->hora_llegada }} </td>
              <td align="center"> {{ $vuelosr->nro_escala }} </td>
              <td align="center"> {{ $vuelosr->precio_vuelo }} </td>
              <td align="center"> <a href="" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Ver detalles</a> </td>
            </tr>
      @endforeach
      </tbody>
</table>
</div>
    @else
      <h3>
        <span class="label label-warning">No hay vuelos disponibles</span>
      </h3>
    @endif
  </body>
@endsection
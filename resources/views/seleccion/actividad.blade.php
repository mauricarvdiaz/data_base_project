@extends("layouts.plantilla1")
@section('titulo', 'Actividades')

@section("buscador")
	<body style="background-color:#78909C;">
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Tipo de Actividad</th>
          <th scope="col" align="center">Descripcion</th>
          <th scope="col" align="center">Cupos disponibles menores</th>
          <th scope="col" align="center">Cupos disponibles mayores</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center">Seleccionar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($actividades as $actividad)
        	<tr>
              <td align="center"> {{ $actividad->tipo_actividad }}</td>
              <td align="center"> {{ $actividad->descripcion }}</td>
              <td align="center"> {{ $actividad->nro_menores_edad }}</td>
              <td align="center"> {{ $actividad->nro_mayores_edad }} </td>
              <td align="center"> {{ $actividad->precio_actividad }} </td>
              <td align="center"> <a href="" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Reservar</a> </td>
            </tr>
		@endforeach
      </tbody>
    </table>
    </div>
  </body>
@endsection
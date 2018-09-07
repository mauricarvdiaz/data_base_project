@extends("layouts.plantilla")
@section('titulo', 'Admin Alojamiento')

@section('contenido')
	<body style="background-color: #F0B27A" >
		<div style="margin-top: 50px; margin-left: 50px; margin-right: 50px">
			<a href="/hoteles/create"><button type="button" class="btn btn-primary btn-xs">Agregar Hotel</button></a>
			<table class="table table-borderer"  style="background-color:#ECF0F1; ">
			<thead>
				<th>Tipo Actividad</th>
				<th>Id Ciudad</th>
				<th>Fecha</th>
				<th>Numero mayores edad</th>
				<th>Numero menores edad</th>
				<th>Precio</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($Actividades as $actividad)
					<tr>
						<td>{{$actividad->tipo_actividad}}</td>
						<td>{{$actividad->id_ciudad}}</td>
						<td>{{$actividad->fecha}}</td>
						<td>{{$actividad->nro_mayores_edad}}</td>
						<td>{{$actividad->nro_menores_edad}}</td>
						<td>{{$actividad->precio_actividad}}</td>
						<td><a href="{{route('hoteles.destroy', $hotel->rut_hotel)}}"><button type="button" class="btn btn-danger btn-xs">Eliminar</button></a>
							<a href="/hoteles/{{$hotel->rut_hotel}}/edit"><button type="button" class="btn btn-warning btn-xs">Editar</button></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $hoteles->render() !!}
		</div>
	</body>
@endsection
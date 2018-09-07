@extends("layouts.plantilla")
@section('titulo', 'Admin Alojamiento')

@section('contenido')
	<body style="background-color: #F0B27A" >
		<div style="margin-top: 50px; margin-left: 50px; margin-right: 50px">
			<a href="/hoteles/create"><button type="button" class="btn btn-primary btn-xs">Agregar Hotel</button></a>
			<table class="table table-borderer"  style="background-color:#ECF0F1; ">
			<thead>
				<th>Nombre</th>
				<th>Id Ciudad</th>
				<th>Rut</th>
				<th>Direccion</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($hoteles as $hotel)
					<tr>
						<td>{{$hotel->nombre}}</td>
						<td>{{$hotel->id_ciudad}}</td>
						<td>{{$hotel->rut_hotel}}</td>
						<td>{{$hotel->calle_hotel}} N° {{$hotel->nro_calle_hotel}}</td>
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
@extends("layouts.plantilla")
@section('titulo', 'Admin Alojamiento')

@section('contenido')
	<body style="background-color: #F0B27A">
		<h2 class="text-center" style="margin-top: 10px">Administracion Hoteles</h2>
		<hr>
		<div class="container">
					<h3 style="margin-left: 20px">Editar hotel</h3>
					{!! Form::open(['route' => ['hoteles.update', $hotel->rut_hotel], 'method' => 'PUT']) !!}
					   <div class="form-group" style="margin: 20px; width: 500px">
					     <label for="nombre">Nombre Hotel</label>
					    <input type="text" name="nombre" value="{{$hotel->nombre}}" class="form-control" placeholder="" required>
					   </div>
					   <div class="form-group" style="margin: 20px; width: 500px">
					      <label for="rut_hotel">Rut</label>
					      <input type="number" name="rut_hotel" value="{{$hotel->rut_hotel}}" class="form-control" placeholder="" required>
					    </div>
					    <div class="form-group" style="margin: 20px; width: 500px">
					      <label for="id_ciudad">Ciudad</label>
					      <input type="number" name="id_ciudad" value="{{$hotel->id_ciudad}}" class="form-control" placeholder="" required>
					    </div>
					    <div class="form-group" style="margin: 20px; width: 500px">
					      <label for="nro_calle_hotel">Numero calle</label>
					      <input type="number" name="nro_calle_hotel" value="{{$hotel->nro_calle_hotel}}" class="form-control" placeholder="" required>
					    </div>
					    <div class="form-group" style="margin: 20px; width: 500px">
					      <label for="calle_hotel">Calle hotel</label>
					      <input type="text" name="calle_hotel" value="{{$hotel->calle_hotel}}" class="form-control" placeholder="" required>
					    </div>
					   <div class="form-group">
					     {!! Form::submit('Editar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
					   </div>
					{!! Form::close() !!}
				
		</div>
	</body>
@endsection
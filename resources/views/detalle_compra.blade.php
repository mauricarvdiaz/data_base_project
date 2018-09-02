@extends('layouts.plantilla')
@section('titulo', 'Detalle compras')

@section('contenido')
	<body style="background-color: #F0B27A">
		<div class="container">
			<div class="page-header text-center">
				<h2>Detalle del pedido</h2>
			</div>
			<div class="page">
				<div class="table-responsive">
					<h4>Datos del usuario</h4>
					<table class="table table-striped table-hover table-bordered" style="background-color: #D6EAF8">
						<tr><td>Nombre:</td><td>{{ Auth::user()->name }}</td></tr>
						<tr><td>Correo:</td><td>{{ Auth::user()->email }}</td></tr>
						<tr><td>Saldo disponible:</td><td>${{ Auth::user()->fondo_usuario }}</td></tr>
					</table>
				</div>
				<div class="table-responsive">
					<h4>Datos del pedido</h4>
					<table class="table table-striped table-hover table-bordered" style="background-color: #D6EAF8">
						<tr>
							<th>Producto</th>
							<th>Detalle</th>
							<th>Precio</th>
							<th>Subtotal</th>
						</tr>
						@foreach($carrito as $clave => $productos)
							<tr>
								@if($clave == "habitacion")
									@for($i = 0; $i < count($productos); $i++)
										<td>Habitacion</td>
										<td>Reserva habitacion N° {{$productos[$i]->nro_habitacion}}, con fecha de entrada {{$productos[$i]->fecha_entrada}} y fecha de salida {{$productos[$i]->fecha_salida}}</td>
										<td>
											Precio por noche ${{ $productos[$i]->precio_noche}} 
										</td>
										<td> ${{ $subtotal[$clave][$i] }}</td>
									@endfor
								@elseif($clave == "actividad")
									@for($i = 0; $i < count($productos); $i++)
										<td>Actividad</td>
										<td>Reserva Actividad {{$productos[$i]->tipo_actividad}} para 
											@if($productos[$i]->nro_mayores_edad > 0)
												{{$productos[$i]->nro_mayores_edad}} adultos 
											@endif
											@if($productos[$i]->nro_menores_edad > 0)
												{{$productos[$i]->nro_menores_edad}} menores
											@endif
										</td>
										<td>Precio por persona ${{ $productos[$i]->precio_actividad }}</td>
										<td>${{ $subtotal[$clave][$i] }}</td>
									@endfor
								@endif
							</tr>
						@endforeach
					</table>
					<hr>
					<h3>
						<span class="label label-success">
							Total: ${{$total}}
						</span>
					</h3>
					@if(Auth::user()->fondo_usuario < $total)
						<span class="label label-danger">
							No tienes saldo disponible para realizar esta compra
						</span>
					@endif
					<hr>
					<p>
						<a href="{{ route('carrito-compras') }}" class="btn btn-primary">Volver al carrito</a>
						@if(Auth::user()->fondo_usuario >= $total)
							<a href="/habitacion/reserva" class="btn btn-primary" name="botonReservar">Reservar</a>
						@endif
					</p>
				</div>
			</div>
		</div>
	</body>
@endsection
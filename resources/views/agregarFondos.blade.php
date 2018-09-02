@extends('layouts.plantilla')
@section('titulo', 'Añadir fondos')

@section('contenido')
	<body style="background-color: #F0B27A">
		<form action="/anadir/fondo" method="GET">
		<div class="container">
			<div class="page">
				<div class="table-responsive">
					<h4>Datos del usuario</h4>
					<table class="table table-striped table-hover table-bordered" style="background-color: #D6EAF8">
						<tr><td>Nombre:</td><td>{{ Auth::user()->name }}</td></tr>
						<tr><td>Correo:</td><td>{{ Auth::user()->email }}</td></tr>
						<tr><td>Saldo actual:</td><td>${{ Auth::user()->fondo_usuario }}</td></tr>
						<tr>
							<div class="input-field">
								<td><label for="monto">Monto a añadir:</label></td>
								<td>
									<input class="form-control" type="number" name="monto"/>
								</td>
							</div>
						</tr>
					</table>
					<p>
						<a>{!! Form::submit('Añadir saldo', ['class' => 'btn btn-primary']) !!}</a>
					</p>
				</div>
			</div>
		</div>
		</form>
	</body>
@endsection
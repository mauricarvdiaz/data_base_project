@extends('layouts.plantilla')
@section('titulo', 'Reservas')

@section('contenido')
	<body style="background-color: #F0B27A">
		<div class="container">
			<div class="page-header text-center">
                <h2>Tus Reservas</h2>
            </div>
            @if(count($reservas) > 0)
            	<table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Detalle</th>
                <th scope="col" align="center">Monto Reserva</th>
                <th scope="col" align="center">Fecha reserva</th>
                <th scope="col" align="center">Hora Reserva</th>
                <!--<th scope="col" align="center">Quitar</th>-->
              </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                     <tr>
                     	<td>{{ $reserva->detalle }}</td>
                     	<td>${{ $reserva->monto_reserva }}</td>
                     	<td>{{ $reserva->fecha_reserva }}</td>
                     	<td>{{ $reserva->hora_reserva }}</td>
                     </tr>
                @endforeach
            </tbody>
            </table>
            @else
            	<h3>
                    <span class="label label-warning">No tienes ninguna reserva</span>
                </h3>
            @endif
            
		</div>
	</body>
@endsection
@extends('layouts.plantilla')
@section('titulo', 'Habitaciones')

@section('contenido')
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container" style="margin-top: -200px">
        	@if(count($carrito['habitacion']) > 0 || count($carrito['actividad']) > 0 && count($carrito['vuelo']) > 0 && count('vehiculo') > 0 && count('paquete') > 0)
        	<table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Producto</th>
                <th scope="col" align="center">Precio</th>
                <th scope="col" align="center">Cantidad</th>
                <th scope="col" align="center">Subtotal</th>
              	<th scope="col" align="center">Quitar</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($carrito as $clave => $productos)
            			@if($clave === "habitacion")
	            			@for($i = 0; $i < count($productos); $i++)
	            				<tr>
	            					<td>habitacion</td>
		            				<td>{{ $productos[$i]->precio_noche }} por noche</td>
		            				<td>Por X noches</td>
		            				<td>{{ $productos[$i]->precio_noche }} x noches</td>
		            				<td>
		            					<a href="/carrito/borrar/habitacion/{{$i}}" class="btn btn-danger">
		            						<i class="fa fa-remove"></i>
		            					</a>
		            				</td>
		            			</tr>
	            			@endfor
            			@elseif($clave === "actividad")
            				
            			@elseif($clave === "vehiculo")
            				
            			@elseif($clave === "vuelo")
            			
            			@elseif($clave === "paquete") <!--Paquete-->
            				
            			@endif
            	@endforeach
            </tbody>
        	</table>
		    <div class="row">
		    	<div class="col-6 col-md-4">
			      <a href="/carrito/vaciar" class="btn btn-danger">Vaciar carrito</a>
			    </div>
			    <div class="col-6 col-md-4">
			      <a href="/" class="btn btn-danger">Seguir comprando</a>
			    </div>
			    <div class="col-6 col-md-4">
			      <a href="" class="btn btn-danger">Continuar</a>
			      <label class="label label-succes">Total: {{$total}}</label>
		    	</div>
			</div>
			
        	@else
        		<h3>
        			<span class="label label-warning">No hay productos en el carrito</span>
        		</h3>
        	@endif
        </div>
      </div>
    </div>
@endsection
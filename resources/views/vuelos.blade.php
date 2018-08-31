@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section('contenido')
<script type="text/javascript">
	function habilitar(){
		document.getElementById('date-end').disabled=false;
	}
	function deshabilitar(){
		document.getElementById('date-end').disabled=true;
	}
	function limpiar(id) {
    	document.getElementById(id).value = "mm/dd/yyyy";
	}
</script>

<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_5.jpg);">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="/vuelos/search" method="GET">
	{{ csrf_field() }} 
	<div class="tabulation animate-box">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="hotels" role="tab" data-toggle="tab">Escoge tu vuelo</a>
		  </li> 
		</ul>
		<!-- Tab panes -->	
		<div class="tab-content">
		 <div role="tabpanel" class="tab-pane active" id="flights">
			<div class="row">
				<div class="col-xxs-12 col-xs-4 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio1" name="radio" type="radio" class="custom-control-input" checked="checked" onclick="habilitar(),limpiar('date-end'),limpiar('date-start')">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Ida y Vuelta</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-3 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio2" name="radio" type="radio" class="custom-control-input" onclick="deshabilitar(),limpiar('date-end'),limpiar('date-start')">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Solo Ida</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-5 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio3" name="radio" type="radio" class="custom-control-input" onclick="deshabilitar(),limpiar('date-end'),limpiar('date-start')">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Multiples Destinos</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<div class="input-field">
						<label for="from">Origen:</label>
						<input type="text" class="form-control" id="from-place" placeholder="Ingresa tu origen"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<div class="input-field">
						<label for="from">Destino:</label>
						<input type="text" class="form-control" id="to-place" placeholder="Ingresa tu destino"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt alternate">
					<div class="input-field">
						<label for="date-start">Partida:</label>
						<input type="text" class="form-control" id="date-start" placeholder="mm/dd/yyyy"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt alternate">
					<div class="input-field">
						<label for="date-end">Regreso:</label>
						<input type="text" class="form-control" id="date-end" placeholder="mm/dd/yyyy"/>
					</div>
				</div>
				<div class="col-sm-12 mt">
					<section>
						<label for="class">Clase:</label>
						<select class="cs-select cs-skin-border">
							<option value="" disabled selected>Económica/Turista</option>
							<option value="economy">Económica/Turista</option>
							<option value="first">Primera Clase</option>
							<option value="business">Ejecutiva</option>
						</select>
					</section>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<section>
						<label for="class">Adultos:</label>
						<select class="cs-select cs-skin-border">
							<option value="" disabled selected>1</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</section>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<section>
						<label for="class">Menores:</label>
						<select class="cs-select cs-skin-border">
							<option value="" disabled selected>0</option>
							<option value="4">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</section>
				</div>
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary btn-block" value="Buscar Vuelos">
				</div>
			</div>
		</div>
	</div>
</form>
</div>
					<div class="desc2 animate-box">
						<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
							<h2 style="margin-top: -100px">@yield('mensaje1')</h2>
							<h3>@yield('mensaje2')</h3>
							<!--<span class="price">$599</span>-->
							<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
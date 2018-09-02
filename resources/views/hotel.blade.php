@extends("layouts.plantilla")
@section('titulo', 'Alojamientos')

@section('mensaje1', 'Busca un alojamiento en el lugar que quieras')
@section('contenido')

<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_5.jpg);">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="hoteles/search" method="GET">
	{{ csrf_field() }} 
	<div class="tabulation animate-box">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="hotels" role="tab" data-toggle="tab">Busca tu alojamiento</a>
		  </li> 
		</ul>
		<!-- Tab panes -->
		<div class="tab-content"> 
		 <!--Seccion de Alojamientos-->
			 <div role="tabpanel" class="tab-pane active" id="hotels">
			 	<div class="row">
					<div class="col-xxs-12 col-xs-12 mt">
						<div class="input-field">
							<label for="destino">Ciudad:</label>
							<input type="text" class="form-control" name="destino" placeholder="destino"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt alternate">
						<div class="input-field">
							<label for="fecha_entrada">Fecha entrada:</label>
							<input type="date" class="form-control" id="" name="fecha_entrada" placeholder="mm/dd/yyyy"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt alternate">
						<div class="input-field">
							<label for="fecha_salida">Fecha salida:</label>
							<input type="date" class="form-control" id="" name="fecha_salida" placeholder="mm/dd/yyyy"/>
						</div>
					</div>
					<div class="col-sm-12 mt">
						<section>
							<label for="class">Habitaciones:</label>
							<select name="cantidad_hab" class="cs-select cs-skin-border">
								<!--<option value="" selected>1</option>-->
								<option value="1">1</option>
								<option value="1">2</option>
								<!--<option value="business">3</option>-->
							</select>
						</section>
					</div>
					<div class="col-xxs-12 col-xs-6 mt">
						<section>
							<label for="adultos_hab1">Adultos habitacion 1:</label>
							<select name="adultos_hab1" class="cs-select cs-skin-border">
								
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</section>
						<section>
							<label for="adultos_hab2">Adultos habitacion 2:</label>
							<select name="adultos_hab2" class="cs-select cs-skin-border">
								
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</section>
					</div>
					<div class="col-xxs-12 col-xs-6 mt">
						<section>
							<label for="menores_hab1">Niños habitacion 1:</label>
							<select name="menores_hab1" class="cs-select cs-skin-border">
								
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</section>
						<section>
							<label for="menores_hab2">Niños habitacion 2:</label>
							<select name="menores_hab2" class="cs-select cs-skin-border">
								
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</section>
					</div>
					<div class="col-xs-12">
						{!! Form::submit('Buscar Hotel', ['class' => 'btn btn-primary btn-block']) !!}
					</div>
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
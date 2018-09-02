@extends("layouts.plantilla")
@section('titulo', 'Actividades')
@section('mensaje1', 'Busca una actividad en el lugar que quieras')
@section('contenido')
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_5.jpg);">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="actividad/search" method="GET">
	{{ csrf_field() }} 
	<div class="tabulation animate-box">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="hotels" role="tab" data-toggle="tab">Busca tu actividad</a>
		  </li> 
		</ul>
		<!-- Tab panes -->
		<div class="tab-content"> 
			<form action="actividad/search" method="GET">
				<div role="tabpanel" class="tab-pane active" id="actividad">
			 		<div class="row">
						<div class="col-xxs-12 col-xs-12 mt">
							<div class="input-field">
								<label for="destino">Ciudad:</label>
								<input type="text" class="form-control" name="destino" id="from-place" placeholder="destino"/>
							</div>
						</div>
						<!--
						<div class="col-xxs-12 col-xs-6 mt alternate">
							<div class="input-field">
								<label for="date-start">Fecha entrada:</label>
								<input type="text" class="form-control" id="date-start" placeholder="mm/dd/yyyy"/>
							</div>
						</div>
						<div class="col-xxs-12 col-xs-6 mt alternate">
							<div class="input-field">
								<label for="date-end">Fecha salida:</label>
								<input type="text" class="form-control" id="date-end" placeholder="mm/dd/yyyy"/>
							</div>
						</div> -->
					<!--	<div class="col-sm-12 mt">
							<section>
								<label for="class">Habitaciones:</label>
								<select class="cs-select cs-skin-border">
									<option value="" disabled selected>1</option>
									<option value="economy">1</option>
									<option value="first">2</option>
									<option value="business">3</option>
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
								<label for="class">Niños:</label>
								<select class="cs-select cs-skin-border">
									<option value="" disabled selected>1</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</section>
						</div> -->
						<div class="col-xs-12">
							{!! Form::submit('Buscar Actividad', ['class' => 'btn btn-primary btn-block']) !!}
						</div>
					</div>
			 	</div>
		 	</form>
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

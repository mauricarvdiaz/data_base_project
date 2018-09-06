@extends("layouts.plantilla")
@section('titulo', 'Traslado')

@section('contenido')

<body style="background-color:#AF601A;">
<div class="fh5co-hero">

		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-color:#AF601A;">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="/traslado/search" method="GET">
	{{ csrf_field() }}
	<div class="tabulation animate-box">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="hotels" role="tab" data-toggle="tab">Escoge tu traslado</a>
		  </li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		 <div role="tabpanel" class="tab-pane active" id="flights">
			<div class="row">
				<div class="col-xxs-12 col-xs-6 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio1" name="radio" type="radio" class="custom-control-input" value="1" checked="checked">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Aeropuerto - Hotel</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio2" name="radio" type="radio" class="custom-control-input" value="2">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Hotel - Aeropuerto</span>
					</label>
				</div>
					<div class="col-xxs-12 col-xs-6 mt">
						<div class="input-field">
							<label for="nomAeropuerto">Nombre aeropuerto:</label>
							<input type="text" required="true" name="nomAeropuerto" class="form-control" id="nomAeropuerto" placeholder="Nombre aeropuerto"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt">
						<div class="input-field">
							<label for="nomHotel">Nombre hotel:</label>
							<input type="text" required="true" name="nomHotel" class="form-control" id="nomHotel" placeholder="Nombre hotel"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt alternate">
						<div class="input-field">
							<label for="datestart">Fecha:</label>
							<input type="date" style="color: #E67E22;font-weight: bold;background-color: #F4ECF7;border:none;" required="true" name="datestart" class="form-control" id="datein" placeholder="mm/dd/yyyy"/>
						</div>
					</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<section>
						<label for="class">Pasajeros:</label>
						<select name="numPasajeros" class="cs-select cs-skin-border">
							<!--<option value="" disabled selected>1</option>-->
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</section>
				</div>
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary btn-block" value="Buscar Traslado">
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
</body>
@endsection

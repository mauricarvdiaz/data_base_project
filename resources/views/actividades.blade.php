@extends("layouts.plantilla")
@section('titulo', 'Actividades')
@section('contenido')
	<div class="tabulation animate-box">
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="actividad" role="tab" data-toggle="tab">Busca tu actividad</a>
		  </li> 
		</ul>
		<div class="tab-content"> 
			<form action="actividad/search" method="GET">
				<div role="tabpanel" class="tab-pane active" id="actividad">
			 		<div class="row">
						<div class="col-xxs-12 col-xs-12 mt">
							<div class="input-field">
								<label for="from">Ciudad:</label>
								<input type="text" class="form-control" id="from-place" placeholder="destino"/>
							</div>
						</div>
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
						</div>
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
							{!! Form::submit('Buscar Hotel', ['class' => 'btn btn-primary btn-block']) !!}
						</div>
					</div>
			 	</div>
		 	</form>
		</div>
	</div>
@endsection

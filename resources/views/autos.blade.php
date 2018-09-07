@extends("layouts.plantilla")
@section('titulo', 'Vehiculos')

@section('contenido')
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_5.jpg);">
			<div class="desc">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="autos/search" method="GET">
	{{ csrf_field() }} 
	<div class="tabulation animate-box">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active">
			   <a href="" aria-controls="autos" role="tab" data-toggle="tab">Arrienda tu auto</a>
		  </li> 
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		 <div role="tabpanel" class="tab-pane active" id="flights">
			<div class="row">
				<div class="col-xxs-12 col-xs-12 mt">
					<div class="input-field">
						<label for="from">Lugar de entrega:</label>
						<input type="text" required="true" name="destino" class="form-control" id="from-place" placeholder="Ingresa tu origen"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt alternate">
					<div class="input-field">
						<label for="date-start">Fecha entrega:</label>
							<input type="date" style="color: #E67E22;font-weight: bold;background-color: #F4ECF7;border:none;" required="true" name="datestart" class="form-control" id="datein" placeholder="mm/dd/yyyy"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt alternate">
					<div class="input-field">
						<label for="date-end">Fecha devolución:</label>
							<input type="date" style="color: #E67E22;font-weight: bold;background-color: #F4ECF7;border:none;" required="true" name="dateend" class="form-control" id="dateout" placeholder="mm/dd/yyyy"/>
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 mt alternate">
					<div class="input-field">
						<label for="time-start">Hora entrega:</label>
 						<input type="time" required="true" name="hora1" style="color:coral; font-weight:bold; font-size: 95%"/>

                    </div>
				</div>
				<div class="col-xxs-12 col-xs-20 mt alternate">
					<div class="input-field">
						<label for="time-end">Hora devolución:</label>
 						<input type="time" required="true" name="hora2" style="color:coral; font-weight:bold; font-size: 95%"/>
					</div>
				</div>
				
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary btn-block" value="Buscar autos">
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


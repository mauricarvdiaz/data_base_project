@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section('contenido')
<script type="text/javascript">
	function agregar(id){
		document.getElementById(id).style.visibility="visible";
	}
	function quitar(id){
		document.getElementById(id).style.visibility="hidden";		
	}
	function quitarTabla(id){
		document.getElementById(id).style.visibility="collapse";
	}
	function habilitar(id){
		document.getElementById(id).disabled=false;
	}
	function deshabilitar(id){
		document.getElementById(id).disabled=true;
	}
	function limpiar(id) {
    	document.getElementById(id).value = "mm/dd/yyyy";
	}
	var nextinput = 1;
    function AgregarCampos(){
    	if (nextinput >= 1 && nextinput < 3) {
    		agregar("tramosBtn");
    		agregar("agregarTramo");
    	}
    	if (nextinput == 3) {
    		quitar("agregarTramo");
    	}
    	if (nextinput <= 4 && nextinput >= 2) {
    		agregar("eliminarTramo");
    		agregar("tramosBtn");
    	}
    	if (nextinput <= 3) {
    		campo ='<div id="cuadro'+nextinput+'"><div class="col-xxs-12 col-xs-6 mt"><div class="input-field"><label for="origen">Origen:</label><input type="text" name="origen'+nextinput+'" class="form-control" id="origen'+nextinput+'" placeholder="Ingresa tu origen"/></div></div><div class="col-xxs-12 col-xs-6 mt"><div class="input-field"><label for="destino">Destino:</label><input type="text" name="destino'+nextinput+'" class="form-control" id="destino'+nextinput+'" placeholder="Ingresa tu destino"/></div></div><div class="col-xxs-12 col-xs-6 mt alternate"><div class="input-field"><label for="datestart">Partida:</label><input type="date" name="datestart'+nextinput+'" class="form-control" id="datein'+nextinput+'" placeholder="mm/dd/yyyy"/></div></div><div class="col-xxs-12 col-xs-6 mt alternate"><div class="input-field"><label id="regreso'+nextinput+'" for="dateend" style="visibility:hidden">Regreso:</label><input type="date" name="dateend'+nextinput+'" class="form-control" id="dateout'+nextinput+'" placeholder="mm/dd/yyyy" style="visibility:hidden" disabled/></div></div></div>';
    		$("#campos").append(campo);
    		nextinput++;
    	}
    }
    function eliminarCampo(){
    	if (nextinput > 1) {
    		nextinput--;
    		if (nextinput != 1) {
    			$("#cuadro"+nextinput).remove();
    		}
    	}
    	if (nextinput <= 2) {
    		quitar("eliminarTramo")
    	}
    	if (nextinput <= 3) {
    		agregar("agregarTramo")
    	}
    }
    function quitarCampos(){
    	while(nextinput!=0){
    		$("#cuadro"+nextinput).remove()
    		nextinput--;
    	}
    	nextinput = 1;
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
	  					<input id="radio1" name="radio" type="radio" class="custom-control-input" value="1" checked="checked" onclick="agregar('dateout'),agregar('regreso'),habilitar('dateout'),limpiar('datein'),limpiar('dateout'),quitar('eliminarTramo'),quitar('agregarTramo'),quitarTabla('tramosBtn'),quitarCampos()">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Ida y Vuelta</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-3 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio2" name="radio" type="radio" class="custom-control-input" value="2" onclick="deshabilitar('dateout'),agregar('dateout'),agregar('regreso'),limpiar('datein'),limpiar('dateout'),quitar('eliminarTramo'),quitar('agregarTramo'),quitarTabla('tramosBtn'),quitarCampos()">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Solo Ida</span>
					</label>
				</div>
				<div class="col-xxs-12 col-xs-5 mt">
					<label class="custom-control custom-radio">
	  					<input id="radio3" name="radio" type="radio" class="custom-control-input" value="3" onclick="quitar('regreso'),quitar('dateout'),limpiar('datein'),limpiar('dateout'),AgregarCampos(),deshabilitar('dateout')">
	  					<span class="custom-control-indicator"></span>
	 					<span class="custom-control-description">Multiples Destinos</span>
					</label>
				</div>
				<div id="cuadro">
					<div class="col-xxs-12 col-xs-6 mt">
						<div class="input-field">
							<label for="origen">Origen:</label>
							<input type="text" name="origen" class="form-control" id="origen" placeholder="Ingresa tu origen"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt">
						<div class="input-field">
							<label for="destino">Destino:</label>
							<input type="text" name="destino" class="form-control" id="destino" placeholder="Ingresa tu destino"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt alternate">
						<div class="input-field">
							<label for="datestart">Partida:</label>
							<input type="date" name="datestart" class="form-control" id="datein" placeholder="mm/dd/yyyy"/>
						</div>
					</div>
					<div class="col-xxs-12 col-xs-6 mt alternate">
						<div class="input-field">
							<label id="regreso" for="dateend">Regreso:</label>
							<input type="date" name="dateend" class="form-control" id="dateout" placeholder="mm/dd/yyyy"/>
						</div>
					</div>
				</div>
				<div id="campos"></div>
				<table id="tramosBtn" style="visibility: collapse;width: 100%;">
					<tr>
						<td style="text-align: left;">
							<div class="button" id="eliminarTramo" style="visibility: hidden;margin-left: 20px">
                				<a href="#" onclick="eliminarCampo()">
                					<h5 style="color: #C0392B;font-weight: bold;">Eliminar tramo</h5>
                				</a>
            				</div>
						</td>
						<td style="text-align: right;">
							<div class="button" id="agregarTramo" style="visibility: hidden">
                				<a href="#" onclick="AgregarCampos();">
                					<h5 style="color: #148F77;font-weight: bold;margin-right: 20px">Agregar tramo</h5>
                				</a>
            				</div>
						</td>
					</tr>
				</table>
				<div class="col-sm-12 mt">
					<section>
						<label for="class">Clase:</label>
						<select name="claseVuelo" class="cs-select cs-skin-border">
							<!--<option value="1" disabled selected>Economica</option>-->
							<option value="Economica">Economica</option>
							<option value="Primera Clase">Primera Clase</option>
							<option value="Ejecutiva">Ejecutiva</option>
						</select>
					</section>
				</div>
				<div class="col-xxs-12 col-xs-6 mt">
					<section>
						<label for="class">Adultos:</label>
						<select name="nroAdultos" class="cs-select cs-skin-border">
							<!--<option value="" disabled selected>1</option>-->
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
						<select name="nroMenores" class="cs-select cs-skin-border">
							<!--<option value="" disabled selected>0</option>-->							
							<option value="0">0</option>
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

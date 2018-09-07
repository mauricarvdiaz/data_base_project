@extends("layouts.plantilla")
@section('titulo', 'Paquetes')

@section('mensaje1', 'Busca tu paquete')
@section('contenido')

<script type="text/javascript">
  function agregarHabitacion(id){
    document.getElementById(id).style.display="initial";
  }
  function quitarHabitacion(id){
    document.getElementById(id).style.display="none";    
  }
</script>

<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_5.jpg);">
      <div class="desc">
        <div class="container">
          <div class="row">
            <div class="col-sm-5 col-md-5" style="margin-top: -70px">
<form action="paquete/search" method="GET">
  {{ csrf_field() }} 
  <div class="tabulation animate-box">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
         <a href="" aria-controls="hotels" role="tab" data-toggle="tab">Sobre el paquete</a>
      </li> 
    </ul>
    <!-- Tab panes -->
    <div class="tab-content"> 
     <!--Seccion de Alojamientos-->
       <div role="tabpanel" class="tab-pane active" id="hotels">
        <div class="row">
          <div class="col-xxs-12 col-xs-6 mt">
            <label class="custom-control custom-radio">
                <input id="radio1" name="radio" type="radio" value=1 class="custom-control-input" checked="checked" onclick="agregarHabitacion('habitacion')">
                <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Vuelo + habitación</span>
            </label>
          </div>
          <div class="col-xxs-12 col-xs-6 mt">
            <label class="custom-control custom-radio">
                <input id="radio2" name="radio" type="radio" value=2 class="custom-control-input" onclick="quitarHabitacion('habitacion')">
                <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Vuelo + auto</span>
            </label>
          </div>
          <div class="col-xxs-12 col-xs-6 mt">
            <div class="input-field">
              <label for="from">Origen:</label>
              <input type="text" required="true" class="form-control" id="from-place" name="origen" placeholder="Ingresa tu origen"/>
            </div>
          </div>
          <div class="col-xxs-12 col-xs-6 mt">
            <div class="input-field">
              <label for="from">Destino:</label>
              <input type="text" required="true" class="form-control" id="to-place" name="destino" placeholder="Ingresa tu destino"/>
            </div>
          </div>
          <div class="col-xxs-12 col-xs-6 mt alternate">
            <div class="input-field">
              <label for="datestart">Fecha ingreso:</label>
              <input type="date" style="color: #E67E22;font-weight: bold;background-color: #F4ECF7;border:none;" required="true" name="fechaIngreso" class="form-control" id="datein" placeholder="mm/dd/yyyy"/>
            </div>
          </div>
          <div class="col-xxs-12 col-xs-6 mt alternate">
            <div class="input-field">
              <label for="datestart">Fecha ingreso:</label>
              <input type="date" style="color: #E67E22;font-weight: bold;background-color: #F4ECF7;border:none;" required="true" name="fechaRetorno" class="form-control" id="datein" placeholder="mm/dd/yyyy"/>
            </div>
          </div>
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
          <div class="col-sm-12 mt" id="habitacion">
            <section>
              <label for="class">Habitaciones:</label>
              <select name="cantidad_hab" class="cs-select cs-skin-border">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </section>
          </div>
          <div class="col-xxs-12 col-xs-6 mt">
            <section>
              <label for="class">Adultos:</label>
              <select class="cs-select cs-skin-border" name="cantAdultos">
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
              <select class="cs-select cs-skin-border" name="cantMenores">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </section>
          </div>

          <div class="col-xs-12">
            <input type="submit" class="btn btn-primary btn-block" value="Buscar Paquetes">
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

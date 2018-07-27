@extends("layouts.plantilla1")
@section('titulo', 'Alojamientos')

@section("buscador")
  <form action="hoteles/search" method="GET">
   {{ csrf_field() }} 
    <div class="" style="margin: 20px 100px">
      <h1>Busca tu Alojamiento</h1>
    </div>
  <table style="margin-left: 100px; border-radius: 10px 5px 10px 5px; background-color: #B2DFDB">
    <tr>
    <th>
      <div class="form-group" style="margin: 10px 100px 10px 20px; width: 20rem">
        <label for="destino">Destino</label>
        <input type="text" name="destino" class="form-control" placeholder="Ciudad destino">
      </div>
      <div class="form-group" style="margin: 10px 100px 10px 20px; width: 20rem">
        <label for="fecha_entrada">Fecha Entrada</label>
        <input type="date" name="fecha_entrada" class="form-control" placeholder="xx-xx-xxxx">
      </div>
      <div class="form-group" style="margin: 10px 100px 10px 20px; width: 20rem">
        <label for="fecha_salida">Fecha Salida</label>
        <input type="date" name="fecha_salida" class="form-control" placeholder="xx-xx-xxxx">
      </div>
    </th>
    <th>
      <ul class="nav nav-tabs" id="myTab" role="tablist" style="">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#hab1" role="tab" aria-controls="hab1" aria-selected="true">habitacion 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#hab2" role="tab" aria-controls="hab2" aria-selected="false">habitacion 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#hab3" role="tab" aria-controls="hab3" aria-selected="false">habitacion 3</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent" style="margin-top: 10px; margin-left: 10px"> 
        <div class="tab-pane fade show active" id="hab1" role="tabpanel" aria-labelledby="hab1-tab">
          <label for="adultosh1">Adultos: </label>
          <input type="number" name="adultosh1" value="1" min="0" max="4"> <br>
          <label for="menoresh1">Menores: </label>
          <input type="number" name="menoresh1" value="0" min="0" max="4"> <br>
          <label for="edadmenor1h1">Edad menor 1: </label>
          <input type="number" name="edadmenor1h1" value="0" min="0" max="17"> <br>
          <label for="edadmenor2h1">Edad menor 2: </label>
          <input type="number" name="edadmenor2h1" value="0" min="0" max="17"> <br>
          <label for="edadmenor3h1">Edad menor 3: </label>
          <input type="number" name="edadmenor3h1" value="0" min="0" max="17"> <br>
          <label for="edadmenor4h1">Edad menor 4: </label>
          <input type="number" name="edadmenor4h1" value="0" min="0" max="17"> <br>
        </div>
        <div class="tab-pane fade" id="hab2" role="tabpanel" aria-labelledby="hab2-tab">
          <label for="adultosh2">Adultos: </label>
          <input type="number" name="adultosh2" value="0" min="0" max="4"> <br>
          <label for="menoresh2">Menores: </label>
          <input type="number" name="menoresh2" value="0" min="0" max="4"> <br>
          <label for="edadmenor1h2">Edad menor 1: </label>
          <input type="number" name="edadmenor1h2" value="0" min="0" max="17"> <br>
          <label for="edadmenor2h2">Edad menor 2: </label>
          <input type="number" name="edadmenor2h2" value="0" min="0" max="17"> <br>
          <label for="edadmenor3h2">Edad menor 3: </label>
          <input type="number" name="edadmenor3h2" value="0" min="0" max="17"> <br>
          <label for="edadmenor4h2">Edad menor 4: </label>
          <input type="number" name="edadmenor4h2" value="0" min="0" max="17"> <br>
        </div>
        <div class="tab-pane fade" id="hab3" role="tabpanel" aria-labelledby="hab3-tab">
          <label for="adultosh3">Adultos: </label>
          <input type="number" name="adultosh3" value="0" min="0" max="4"> <br>
          <label for="menoresh3">Menores: </label>
          <input type="number" name="menoresh3" value="0" min="0" max="4"> <br>
          <label for="edadmenor1h3">Edad menor 1: </label>
          <input type="number" name="edadmenor1h3" value="0" min="0" max="17"> <br>
          <label for="edadmenor2h3">Edad menor 2: </label>
          <input type="number" name="edadmenor2h3" value="0" min="0" max="17"> <br>
          <label for="edadmenor3h3">Edad menor 3: </label>
          <input type="number" name="edadmenor3h3" value="0" min="0" max="17"> <br>
          <label for="edadmenor4h3">Edad menor 4: </label>
          <input type="number" name="edadmenor4h3" value="0" min="0" max="17"> <br>
        </div>
        <label for="">*habitaciones con capacidad max. 4 personas</label>
      </div>
    </th>
    </tr>
  </table>
  @if ($errors->any())
    <div class="alert alert-danger" style="margin: 10px 100px; width: 25rem">
      <ul>
        @foreach($errors->all() as $error)
          <li> {{ $error }} </li>
        @endforeach
      </ul>
    </div>
  @endif
    
    <div class="form-group">
      <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary', 'style' => 'margin: 10px 100px; width: 10rem']); ?>
  <!--      {!! Form::submit('Buscar', ['class' => 'btn btn-primary', 'style' => 'margin: 10px 100px; width: 10rem']) !!} -->
    </div>
  </form>
@endsection

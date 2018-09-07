@extends("layouts.plantilla2")
@section('tabla_hotel')
   {!! Form::open(['route' => 'hoteles.store', 'method' => 'POST']) !!}
   <div class="form-group">
     <label for="nombre">Nombre Hotel</label>
    <input type="text" name="nombre" value="" class="form-control" placeholder="" required>
   </div>
   <div class="form-group">
      <label for="rut_hotel">Rut</label>
      <input type="number" name="rut_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="ciudad_hotel">Ciudad</label>
      <input type="text" name="ciudad_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="nro_calle_hotel">Numero calle</label>
      <input type="number" name="nro_calle_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="calle_hotel">Calle hotel</label>
      <input type="text" name="calle_hotel" value="" class="form-control" placeholder="" required>
    </div>
   <div class="form-group">
     {!! Form::submit('Agregar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
   </div>
   {!! Form::close() !!}
@endsection
@section('tabla_habitacion')
    {!! Form::open(['route' => 'habitaciones.store', 'method' => 'POST']) !!}
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="id_habitacion">N° habitacion</label>
      <input type="number" name="id_habitacion" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="nro_habitacion">N° habitacion</label>
      <input type="number" name="nro_habitacion" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="rut_hotel">Rut hotel</label>
      <input type="number" name="rut_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="capacidad">Capacidad</label>
      <input type="number" name="capacidad" value="" min="1" max="4" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="precio_noche">Precio por noche</label>
      <input type="number" name="precio_noche" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="fecha_entrada">fecha de entrada</label>
      <input type="date" name="fecha_entrada" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="fecha_salida">fecha de salida</label>
      <input type="date" name="fecha_salida" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="tipo">tipo de habitacion</label>
      <input type="number" name="tipo" value="" min="1" max="3" class="form-control" placeholder="" required>
    </div>
    <div class="form-group">
      {!! Form::submit('Agregar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
    </div>
    {!! Form::close() !!}
@endsection

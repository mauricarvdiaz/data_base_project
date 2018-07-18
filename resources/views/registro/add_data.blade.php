@extends("layouts.plantilla2")

@section('tabla_hotel')
   {!! Form::open(['route' => 'hoteles.store', 'method' => 'POST']) !!}
   <div class="form-group" style="margin: 20px; width: 500px">
     {!! Form::label('nombre', 'nombre hotel') !!}
     {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
   </div>
   <div class="form-group" style="margin: 20px; width: 500px">
      <label for="rut_hotel">Rut</label>
      <input type="number" name="rut_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="ciudad">Ciudad</label>
      <input type="text" name="ciudad" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="nro_calle">Numero calle</label>
      <input type="number" name="nro_calle" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="precio_minimo">Precio minimo</label>
      <input type="number" name="precio_minimo" value="" class="form-control" placeholder="" required>
    </div>
   <div class="form-group">
     {!! Form::submit('Agregar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
   </div>
   {!! Form::close() !!}
@endsection
@section('tabla_habitacion')
    {!! Form::open(['route' => 'habitaciones.store', 'method' => 'POST']) !!}
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
      <input type="number" name="capacidad" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
      <label for="precio_noche">Precio por noche</label>
      <input type="number" name="precio_noche" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group">
      {!! Form::submit('Agregar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
    </div>
    {!! Form::close() !!}
@endsection

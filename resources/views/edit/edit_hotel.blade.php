@extends("layouts.plantilla2")
@section('tabla_hotel')
  {!! Form::open(array('route' => ['hoteles.update', $hotel->rut_hotel], 'method' => 'PUT')) !!} 
   <div class="form-group" style="margin: 20px; width: 500px">
     <label for="nombre">Nombre Hotel</label>
    <input type="text" name="nombre" value="" class="form-control" placeholder="" required>
   </div>
   <div class="form-group" style="margin: 20px; width: 500px">
      <label for="rut_hotel">Rut</label>
      <input type="number" name="rut_hotel" value="" class="form-control" placeholder="" required>
    </div>
    <div class="form-group" style="margin: 20px; width: 500px">
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
     {!! Form::submit('Editar', ['class' => 'btn btn-primary', 'style' => 'margin: 20px']) !!}
   </div>
   {!! Form::close() !!}
@endsection

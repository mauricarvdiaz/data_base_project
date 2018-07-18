@extends("layouts.plantilla1")
@section('titulo', 'Actividades')

@section("buscador")

<form action="actividad/search" method="GET" style="margin-left: 20px; width: 20rem">
  <div class="form-group" >
    <label for="destino">Ingrese Destino </label>
    <input type="text" name="destino" class="form-control" placeholder="Destino">
  </div>
  <div class="form-group">
  	{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}	
  </div>
</form>

@endsection
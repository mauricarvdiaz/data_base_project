@extends("layouts.plantilla1")

@section("barraSuperior")

@endsection

@section("buscador")
<form>
  <div class="form-group" style="margin: 70px auto; width: 30rem">
    <label for="formGroupExampleInput">Buscador de Alojamientos</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese destino">
  </div>
  <div class="form-group" style="margin: auto; width: 20rem">
    <label for="formGroupExampleInput">Fechas</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrada">
  </div>
  <div class="form-group" style="margin: auto; width: 20rem">
    <label for="formGroupExampleInput"></label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Salida">
  </div>
</form>

@endsection

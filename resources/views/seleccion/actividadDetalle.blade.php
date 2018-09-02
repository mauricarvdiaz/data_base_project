@extends('layouts.plantilla')
@section('titulo', 'Actividad')

@section('contenido')
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container" style="margin-top: -200px">
          <h3>Detalle de tu actividad</h3>

          <table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Tipo de actividad</th>
                <th scope="col" align="center">Descripcion</th>
                <th scope="col" align="center">Precio</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td align="center"> {{$actividad->tipo_actividad}} </td>
                  <td align="center"> {{$actividad->descripcion}} </td>
                  <td align="center"> $ {{$actividad->precio_actividad}} <br>
                  </td>
                </tr>
            </tbody>
          </table>
          <form action="/carrito/agregar/actividad/{{$actividad->id_actividad}}" method="GET">
          <section>
            <h3>Selecciona una fecha</h3>
              <div class="row" style="background-color: ">
                <div class="col-xxs-12 col-xs-6 mt alternate">
                  <div class="input-field">
                    <label for="fecha">Fecha entrada:</label>
                    <input type="date" class="form-control" id="" name="fecha" placeholder="mm/dd/yyyy"/>
                  </div>
                </div>
                <div class="col-xxs-12 col-xs-6 mt">
                  <section>
                    <label for="adultos">N° Adultos:</label>
                    <select name="adultos" class="cs-select cs-skin-border">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </section>
                  <section>
                    <label for="menores">N° menores:</label>
                    <select name="menores" class="cs-select cs-skin-border">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </section>
                </div>
                <div class="col-xs-12">
                  {!! Form::submit('Añadir al carrito', ['class' => 'btn btn-primary btn-block']) !!}
                </div> 
              </div>
          </section>
          </form>
        </div>
      </div>
    </div>
@endsection
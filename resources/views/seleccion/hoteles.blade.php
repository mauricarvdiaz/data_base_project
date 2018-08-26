@extends('layouts.plantilla')
@section('titulo', 'Hoteles')

@section('contenido')
<div class="fh5co-hero">
  <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/place-5.jpg);">
      <div class="desc">
        <div class="container">
          <div class="row" style="margin-top: -170px">
            <ul class="list-group">
              @foreach($hoteles as $hotel)
                <li class="list-group-item">
                  <div class="col">
                    <h5>{{ $hotel->nombre }}</h5>
                    <h6>Ubicado en {{$hotel->calle_hotel}} numero {{$hotel->nro_calle_hotel}}</h6>
                  </div>
                  <div class="col">
                    
                    <a href="/habitaciones/{{$hotel->rut_hotel}}/{{$fecha_in}}/{{$fecha_out}}/{{$capa1}}/{{$capa2}}" class="btn btn-primary" style="">Ver habitaciones</a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>  
        </div>
      </div>
    </div>
@endsection
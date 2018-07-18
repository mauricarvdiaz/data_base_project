@extends("layouts.plantilla1")
@section('titulo', 'Seleccion hotel')

@section('buscador')
  <body style="background-color:#78909C;">
    @foreach($hoteles as $hotel)
    <div class="card" style="margin-top: 10px;margin-right: 200px; margin-left: 200px;margin-bottom: 10px; height: 250px"> 
      <div class="container">
        <div class="row" style="">
          <div class="rounded" style="width: 200px; height: 247px;">
            <h5 style="margin-left: 30px; margin-top: 80px">Imagen</h5>
          </div>
          <div class="card-body" style="width: 400px; height: 247px;">
            <!--Nombre del hotel-->
            <h5 class="card-title">{{ $hotel->nombre }}</h5>
            <!--Descripcion del hotel-->
            <p class="card-text">Ubicado en el centro de {{ $hotel->ciudad_hotel }}, en este hotel encontraras habitaciones desde
                los {{ $hotel->precio_minimo }}, equipados con aire acondicionado y wifi.</p>
          </div>
          <div class="rounded" style="width: 200px; height: 247px; background-color: #81C784;">
            <!--Precio minimo del hotel-->
            <h5 style="margin-left: 30px; margin-top: 80px">Precio por noche desde $ {{ $hotel->precio_minimo }}</h5>
            <a href="/habitaciones/{{$hotel->rut_hotel}}/{{array_get($info, 'capa1')}}/{{array_get($info, 'noches')}}/{{array_get($info, 'capa2')}}/{{array_get($info, 'capa3')}}" class="btn btn-primary" style="margin-left: 30px;margin-top: 50px">Ver habitaciones</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </body>
@endsection
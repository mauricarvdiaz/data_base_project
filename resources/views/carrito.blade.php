@extends('layouts.plantilla')
@section('titulo', 'Carrito compras')

@section('contenido')
<body style="background-color: #F0B27A">
        <div class="container">
            <div class="page-header text-center">
                <h2>Carrito de compras</h2>
            </div>
            @if(count($carrito['habitacion']) > 0 || count($carrito['actividad']) > 0 || count($carrito['vuelo']) > 0 || count($carrito['vehiculo']) > 0 || count($carrito['paquete']) > 0)
            <table class="table table-bordered" style="background-color: #74B3CB">
            <thead>
              <tr>
                <th scope="col" align="center">Producto</th>
                <th scope="col" align="center">Precio</th>
                <th scope="col" align="center">Cantidad</th>
                <th scope="col" align="center">Subtotal</th>
                <th scope="col" align="center">Quitar</th>
              </tr>
            </thead>
            <tbody>
                @foreach($carrito as $clave => $productos)
                        @if($clave === "habitacion")
                            @for($i = 0; $i < count($productos); $i++)
                                <tr>
                                    <td>habitacion</td>
                                    <td>${{ $productos[$i]->precio_noche }} por noche</td>
                                    <td>Por {{ $subtotal[$clave][$i] / $productos[$i]->precio_noche }} noches</td>
                                    <td> ${{ $subtotal[$clave][$i] }}</td>
                                    <td align="center">
                                        <a href="/carrito/borrar/habitacion/{{$i}}">
                                            <button type="button" class="btn btn-danger btn-xs">x</button>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        @elseif($clave === "actividad")
                            @for($i = 0; $i < count($productos); $i++)
                                <tr>
                                    <td>actividad</td>
                                    <td>${{ $productos[$i]->precio_actividad }} por persona</td>
                                    <td>Para {{ $productos[$i]->nro_menores_edad + $productos[$i]->nro_mayores_edad}} personas</td>
                                    <td>${{ ($productos[$i]->nro_menores_edad + $productos[$i]->nro_mayores_edad) * $productos[$i]->precio_actividad }}</td>
                                    <td align="center">
                                        <a href="/carrito/borrar/actividad/{{$i}}">
                                            <button type="button" class="btn btn-danger btn-xs">x</button>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        @elseif($clave === "vehiculo")
                            
                        @elseif($clave === "vuelo")
                        
                        @elseif($clave === "paquete") <!--Paquete-->
                            
                        @endif
                @endforeach
            </tbody>
            </table> <hr>
                <h3>
                    <span class="label label-success">
                        Total: {{$total}}
                    </span>
                </h3>
            <hr>
            <p>
                <a href="/carrito/vaciar" class="btn btn-primary">Vaciar carrito</a>
                <a href="/" class="btn btn-primary">Seguir comprando</a>
                <a href="{{ route('detalle-orden') }}" class="btn btn-primary">Ir a pagar</a>
            </p>


            @else
                <h3>
                    <span class="label label-warning">No hay productos en el carrito</span>
                </h3>
            @endif
        </div>
    </body>
@endsection
@extends("layouts.plantilla")
@section('titulo', 'Arriendo')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($autosEncontrados) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Selecciona un vehículo</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Compañia</th>
          <th scope="col" align="center">Direccion</th>
          <th scope="col" align="center">Vehiculos disponibles</th>
        </tr>
      </thead>
      <tbody>
        <!-- autosEncontrados [[autos comp 1][autos comp 2][ 3 ][.... 4]]-->
        <!-- companias [[comp 1][comp 2][ 3 ][.... 4]]-->
          @for($i = 0; $i <count($autosEncontrados); $i++)
          <tr>
            @for($j = 0; $j <count($companias); $j++)
              @if($autosEncontrados[$i][0]->id_compania === $companias[$j]->id_compania)
                <td align="center"> {{ $companias[$j]->nombre_compania }}</td>
                <td align="center"> Ubicado en la calle {{ $companias[$j]->calle_compania}} n° {{ $companias[$j]->nro_calle_compania }} </td>
                <td align="center">
                  <a href="/vehiculos/disponibles/{{$j}}">
                      <button  type="button" class="btn btn-primary"> Ver autos </button>
                  </a>
                </td>
              @endif
            @endfor
          </tr>
          @endfor
      </tbody>
    </table>
</div>
    @else
      <h3>
        <span class="label label-warning">No hay autos disponibles</span>
      </h3>
    @endif
  </body>     
@endsection
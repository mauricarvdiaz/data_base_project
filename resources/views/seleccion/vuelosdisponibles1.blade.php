@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($vuelosEncontrados) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Selecciona tu vuelo</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Aerolinea</th>
          <th scope="col" align="center">N° vuelo</th>
          <th scope="col" align="center">Hora salida</th>
          <th scope="col" align="center">Hora llegada</th>
          <th scope="col" align="center">N° escalas</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center"></th>
        </tr>
      </thead>
      <tbody>
      @foreach($vuelosEncontrados as $vuelos)
          <tr>
              <td align="center"> {{ $vuelos->aerolinea }}</td>
              <td align="center"> {{ $vuelos->nro_vuelo }}</td>
              <td align="center"> {{ $vuelos->hora_salida }}</td>
              <td align="center"> {{ $vuelos->hora_llegada }} </td>
              <td align="center"> {{ $vuelos->nro_escala }} </td>
              <td align="center"> {{ $vuelos->precio_vuelo }} </td>
              <td align="center"> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  Detalles
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
      @endforeach
      </tbody>
</table>
</div>
    @else
      <h3>
        <span class="label label-warning">No hay vuelos disponibles</span>
      </h3>
    @endif
  </body>
@endsection
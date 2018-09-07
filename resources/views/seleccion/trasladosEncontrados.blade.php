@extends("layouts.plantilla")
@section('titulo', 'Traslado')

@section("contenido")
  <body style="background-color:#AF601A;">
    @if(count($autosDisponibles) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Selecciona tu vuelo</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Patente</th>
          <th scope="col" align="center">Tipo</th>
          <th scope="col" align="center">Capacidad</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center"></th>
        </tr>
      </thead>
      <tbody>
      @foreach($autosDisponibles as $auto)
          <tr>
              <td align="center"> {{ $auto->first()->patente }}</td>
              <td align="center"> {{ $auto->tipo }}</td>
              <td align="center"> {{ $auto->capacidad }}</td>
              <td align="center"> ${{ $auto->precio_dia }} </td>
              <td align="center"> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $auto->id_vehiculo }}">
                  Detalles
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{ $auto->id_vehiculo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                          <div>
                            <table style="width:100%">
                              <tr>
                                <td align="left">
                                  <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $auto->tipo }} </font>
                                </td>
                                <td align="right">
                                  <font style="font-size:90%;color: #A04000;font-weight:bold"> Patente {{ $auto->patente }} </font>
                                </td> 
                              </tr>
                            </table>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <table style="width:100%">
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-size:95%">{{ $auto->precio }}</font>
                            </td>
                            <td align="center" WIDTH="50"></td> 
                            <td align="center" WIDTH="50">
                              <font style="font-size:95%">{{ $auto->capacidad }}</font>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                         <a href="#" class="btn btn-primary">Añadir al carrito</a>
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
        <span class="label label-warning">No hay traslados disponibles</span>
      </h3>
    @endif
  </body>
@endsection
@extends("layouts.plantilla")
@section('titulo', 'Autos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($autosEncontrados) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
      <h3> Selecciona un vehículo</h3>
      <table class="table table-bordered" style="background-color:#ECF0F1;">
      <thead>
        <tr>
          <th scope="col" align="center">Compañia</th>
          <th scope="col" align="center">Tipo</th>
          <th scope="col" align="center">Capacidad</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center">Detalle de la reserva</th>
        </tr>
      </thead>
      <tbody>
      @foreach($autosEncontrados as $autos)
          <tr>
              @foreach($companias as $compa)
                @if({{$autos->id_compania}} === {{$compa->id_compania}})
                  <td align="center"> {{ $compa->nom_compania }}</td>
                @endif
                <td align="center"> {{ $autos->patente }}</td>
                <td align="center"> {{ $autos->tipo }}</td>
                <td align="center"> {{ $autos->capacidad }} </td>
                <td align="center"> {{ $autos->precio_dia }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $autos->patente }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $autos->patente }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $companias->nombre_compania }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> auto {{ $autos->patente }} </font>
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
                                <font style="font-size:95%">{{ $autos->tipo }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $autos->capacidad }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $autos->precio_dia }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              
                            
                          </table>
                        </div>
                  <!--      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/auto/{{$autos->patente}}/{{$autos->tipo}}/{{$cantidad_viajeros}}" class="btn btn-primary" style="margin-left: 20px;margin-top: 40px">Añadir al carrito</a>
                        </div>  -->
                      </div>
                    </div>
                  </div>
                </td>
              @endforeach   
            </tr>
      @endforeach
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
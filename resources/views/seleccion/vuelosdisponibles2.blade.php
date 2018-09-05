@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if(count($vuelosIda) > 0 && count($vuelosRegreso) > 0)
    <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <h3 style="font-weight:bold"> Selecciona tu vuelo de ida</h3>
      <table class="table table-bordered" style="background-color:#FEF9E7">
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
      @foreach($vuelosIda as $vuelosi)
          <tr>
              <td align="center"> {{ $vuelosi->aerolinea }}</td>
              <td align="center"> {{ $vuelosi->nro_vuelo }}</td>
              <td align="center"> {{ $vuelosi->hora_salida }}</td>
              <td align="center"> {{ $vuelosi->hora_llegada }} </td>
              <td align="center"> {{ $vuelosi->nro_escala }} </td>
              <td align="center"> ${{ $vuelosi->precio_vuelo }} </td>
              <td align="center"> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelosi->nro_vuelo }}">
                  Detalles
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{ $vuelosi->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                          <div>
                            <table style="width:100%">
                              <tr>
                                <td align="left">
                                  <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelosi->aerolinea }} </font>
                                </td>
                                <td align="right">
                                  <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelosi->nro_vuelo }} </font>
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
                              <font style="font-size:95%">{{ $vuelosi->fecha_salida }}</font>
                            </td>
                            <td align="center" WIDTH="50"></td> 
                            <td align="center" WIDTH="50">
                              <font style="font-size:95%">{{ $vuelosi->fecha_llegada }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:bold;font-size:120%">{{ $vuelosi->hora_salida }}</font>
                            </td>
                            <td align="center" WIDTH="50">
                            </td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:bold;font-size:120%">{{ $vuelosi->hora_llegada }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelosi->origen }} </font>
                            </td>
                            <td align="center" WIDTH="50">
                              <p>
                                -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                              </p>
                            </td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelosi->destino }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:75%;color: #B89285">
                                @foreach($aeropuertoOrigen as $aero)
                                {{ $aero->nombre_aeropuerto }}
                                @endforeach 
                              </font>
                            </td>
                            <td align="center" WIDTH="50"></td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:75%;color: #B89285">
                                @foreach($aeropuertoDestino as $aero)
                                {{ $aero->nombre_aeropuerto }}
                                @endforeach
                              </font>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a href="/carrito/agregar/vuelo/{{$vuelosi->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

 <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px; height: 250px">
      <h3 style="font-weight:bold"> Selecciona tu vuelo de regreso</h3>
      <table class="table table-bordered" style="background-color:#FEF9E7">
      <thead>
        <tr>
          <th scope="col" align="center">Aerolinea</th>
          <th scope="col" align="center">N° vuelo</th>
          <th scope="col" align="center">Hora salida</th>
          <th scope="col" align="center">Hora llegada</th>
          <th scope="col" align="center">N° escalas</th>
          <th scope="col" align="center">Precio</th>
          <th scope="col" align="center">Detalles</th>
        </tr>
      </thead>
      <tbody>
      @foreach($vuelosRegreso as $vuelosr)
          <tr>
              <td align="center"> {{ $vuelosr->aerolinea }}</td>
              <td align="center"> {{ $vuelosr->nro_vuelo }}</td>
              <td align="center"> {{ $vuelosr->hora_salida }}</td>
              <td align="center"> {{ $vuelosr->hora_llegada }} </td>
              <td align="center"> {{ $vuelosr->nro_escala }} </td>
              <td align="center"> ${{ $vuelosr->precio_vuelo }} </td>
              <td align="center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelosr->nro_vuelo }}">
                  Detalles
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{ $vuelosr->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                          <div>
                            <table style="width:100%">
                              <tr>
                                <td align="left">
                                  <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelosr->aerolinea }} </font>
                                </td>
                                <td align="right">
                                  <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelosr->nro_vuelo }} </font>
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
                              <font style="font-size:95%">{{ $vuelosr->fecha_salida }}</font>
                            </td>
                            <td align="center" WIDTH="50"></td> 
                            <td align="center" WIDTH="50">
                              <font style="font-size:95%">{{ $vuelosr->fecha_llegada }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:bold;font-size:120%">{{ $vuelosr->hora_salida }}</font>
                            </td>
                            <td align="center" WIDTH="50">
                            </td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:bold;font-size:120%">{{ $vuelosr->hora_llegada }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelosr->origen }} </font>
                            </td>
                            <td align="center" WIDTH="50">
                              <p>
                                -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                              </p>
                            </td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelosr->destino }}</font>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:75%;color: #B89285">
                                @foreach($aeropuertoDestino as $aero)
                                {{ $aero->nombre_aeropuerto }}
                                @endforeach 
                              </font>
                            </td>
                            <td align="center" WIDTH="50"></td> 
                            <td align="center" WIDTH="50">
                              <font style="font-weight:normal;font-size:75%;color: #B89285">
                                @foreach($aeropuertoOrigen as $aero)
                                {{ $aero->nombre_aeropuerto }}
                                @endforeach
                              </font>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                         <a href="/carrito/agregar/vuelo/{{$vuelosr->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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
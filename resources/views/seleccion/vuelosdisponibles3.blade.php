@extends("layouts.plantilla")
@section('titulo', 'Vuelos')

@section("contenido")
  <body style="background-color:#F0B27A;">
    @if($nroTramos === 4)
      <h3>Tramo 1</h3>
      @if(count($tramo1) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo1 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 2</h3>
      @if(count($tramo2) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo2 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 3</h3>
      @if(count($tramo3) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo3 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero3O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero3D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 4</h3>
      @if(count($tramo4) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo4 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero4O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero4D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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


    @elseif($nroTramos === 3)
      <h3>Tramo 1</h3>
      @if(count($tramo1) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo1 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 2</h3>
      @if(count($tramo2) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo2 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 3</h3>
      @if(count($tramo3) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo3 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero3O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero3D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

    @else
      <h3>Tramo 1</h3>
      @if(count($tramo1) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo1 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero1D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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

      <h3>Tramo 2</h3>
      @if(count($tramo2) > 0)
      <div style="margin-top: 10px;margin-right: 50px; margin-left: 50px;margin-bottom: 10px">
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
        @foreach($tramo2 as $vuelos)
            <tr>
                <td align="center"> {{ $vuelos->aerolinea }}</td>
                <td align="center"> {{ $vuelos->nro_vuelo }}</td>
                <td align="center"> {{ $vuelos->hora_salida }}</td>
                <td align="center"> {{ $vuelos->hora_llegada }} </td>
                <td align="center"> {{ $vuelos->nro_escala }} </td>
                <td align="center"> ${{ $vuelos->precio_vuelo }} </td>
                <td align="center"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $vuelos->nro_vuelo }}">
                    Detalles
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="{{ $vuelos->nro_vuelo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div>
                              <table style="width:100%">
                                <tr>
                                  <td align="left">
                                    <font style="font-size:110%;color: #B9770E;font-weight:bold"> {{ $vuelos->aerolinea }} </font>
                                  </td>
                                  <td align="right">
                                    <font style="font-size:90%;color: #A04000;font-weight:bold"> Vuelo {{ $vuelos->nro_vuelo }} </font>
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
                                <font style="font-size:95%">{{ $vuelos->fecha_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-size:95%">{{ $vuelos->fecha_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_salida }}</font>
                              </td>
                              <td align="center" WIDTH="50">
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:bold;font-size:120%">{{ $vuelos->hora_llegada }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->origen }} </font>
                              </td>
                              <td align="center" WIDTH="50">
                                <p>
                                  -<font style="font-weight:normal;font-size:75%"> Clase: </font>
                                  <font style="font-weight:bold;font-size:75%;color: #B89285"> {{ $claseVuelo }} </font>-
                                </p>
                              </td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:95%;color: #B89285">{{ $vuelos->destino }}</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2O as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach 
                                </font>
                              </td>
                              <td align="center" WIDTH="50"></td> 
                              <td align="center" WIDTH="50">
                                <font style="font-weight:normal;font-size:75%;color: #B89285">
                                  @foreach($aero2D as $aero)
                                  {{ $aero->nombre_aeropuerto }}
                                  @endforeach
                                </font>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <a href="/carrito/agregar/vuelo/{{$vuelos->nro_vuelo}}/{{$claseVuelo}}/{{$cantidad_viajeros}}" class="btn btn-primary">Añadir al carrito</a>
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
    @endif

  </body>
@endsection
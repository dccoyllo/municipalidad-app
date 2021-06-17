@extends('layout.layout')
@section('titulo', 'Oficina')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
                <div class="col-lg-12">
                    {{-- <p>{{$oficinas}}</p> --}}

                    <div class="showback">
                      <h4><i class="fa fa-angle-right"></i> Contratos: {{$contratos->total()}}</h4>
                      
                        <table class="table table-striped table-advance table-hover">
                          <hr>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Servicio</th>
                              <th>Costo Total</th>
                              <th>Contribuyente</th>
                              <th>Fecha</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $contador = 1
                            @endphp
                        @foreach ($contratos->sortBy('id_estado_contrato') as $item)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$item->cod}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->servicio->nombre}}</td>
                            <td>{{ 'S/'.number_format($item->impuesto, 2) }}</td>
                            <td>
                              @if ($item->contribuyente->ContribuyenteDNI)
                              {{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->contribuyente->ContribuyenteDNI->personaNatural->nombre}}
                              @else
                                  @if ($item->contribuyente->ContribuyenteRUC)
                                    {{$item->contribuyente->ContribuyenteRUC->personaJuridica->razon_social}}
                                  @endif
                              @endif
                            </td>
                            {{-- <td>{{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->contribuyente->ContribuyenteDNI->personaNatural->nombre}}</td> --}}
                            <td>{{date('d/m/Y', strtotime($item->fecha))}}</td>
                            <td><span class="label {{$item->estado_contrato->color}}">{{$item->estado_contrato->nombre}}</span></td>

                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" title="editar" data-toggle="modal" data-target="#editar-{{$item->id_contrato}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" title="eliminar" data-toggle="modal" data-target="#eliminar-{{$item->id_contrato}}"><i class="fa fa-trash-o "></i></button>
                            <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id_contrato}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/contrato/{{$item->id_contrato}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Contrato</h4>
                                </div>
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="text" class="form-control" value="{{$item->cod}}" disabled>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{$item->nombre}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="5">{{$item->descripcion}}</textarea>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="servicio">Servicio</label>
                                    <input type="text" class="form-control" value="{{$item->servicio->nombre}}" disabled>
                                </div>
                                  
                                  <div class="form-group">
                                    <label for="nombre">Costo Total</label>
                                    <input type="text" class="form-control" value="{{ 'S/'.number_format($item->impuesto, 2) }}" disabled>
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Contribuyente</label>
                                    <input type="text" class="form-control" value=@if($item->contribuyente->ContribuyenteDNI)
                                    "{{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->contribuyente->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->contribuyente->ContribuyenteDNI->personaNatural->nombre}}"
                                    @else
                                        @if($item->contribuyente->ContribuyenteRUC)
                                        "{{$item->contribuyente->ContribuyenteRUC->personaJuridica->razon_social}}"
                                        @endif
                                    @endif disabled>
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" value="{{$item->fecha}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Estado</label>
                                    <select name="estado" class="form-control">
                                      @foreach ($estados as $estado)
                                          @if ($item->estado_contrato->id_estado_contrato == $estado->id_estado_contrato)
                                            <option selected value={{$estado->id_estado_contrato}}>{{$estado->nombre}}</option>
                                          @else
                                            <option value={{$estado->id_estado_contrato}}>{{$estado->nombre}}</option>
                                          @endif
                                      @endforeach
                                    </select>
                                  </div>

                                </div>
          
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                              </form>

                            </div>
                          </div>
                          <!-- Modal para editar oficina -->
                                
                                <!-- Modal para eliminar Contrato -->
                                <div class="modal fade" id="eliminar-{{$item->id_contrato}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar <strong>{{$item->cod}}: {{$item->nombre}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("contrato/{$item->id_contrato}") }}">
                                              @csrf
                                              @method('DELETE')
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                              <button type="submit" class="btn btn-primary">Aceptar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal para eliminar Contrato -->
                            </td>
                        </tr>

                        @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /content-panel -->
                </div>
                <div class="col-lg-12 text-center">
                  {{$contratos->links()}}
                  {{-- <ul class="dataTables_paginate paging_bootstrap pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul> --}}
                </div>
                
                <div class="col-lg-12">
                  @if (session('estado_oficina'))
                          @if (session('estado_oficina') == 1)
                          <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Success!</strong> Se ha eliminado correctamente.
                          </div>
                          @else
                          <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error!</strong> No se ha podido eliminar.
                          </div>
                          @endif
                      @endif
                </div>
                  @if (session('estado'))
                  <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Success!</strong> {{session('estado')}}
                    </div>
                  </div>
                @endif
                @if (session('estado-update'))
                <div class="col-lg-12">
                  @if (session('estado-update') == 1)
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> Se ha actualizado correctamente.
                  </div>
                  @else
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Error!</strong> No se ha podido actualizar.
                  </div>
                  @endif
                </div>
              @endif
                
            </div>
        </section>
        <!-- /wrapper -->
        
    </section>
    <!--main content end-->
@endsection
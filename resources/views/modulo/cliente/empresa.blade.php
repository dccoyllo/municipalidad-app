@extends('layout.layout')
@section('titulo', 'Empresa')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
                <div class="col-lg-12">
                    {{-- <p>{{$oficinas}}</p> --}}

                    <div class="showback">
                      <h4><i class="fa fa-angle-right"></i> Empresas</h4>
                      {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                      <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                          <!-- Modal para agregar Contrato -->
                           <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  <form class="modal-content" method="POST" action="/empresa">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Crear Empresa</h4>
                                    </div>
              
                                    <div class="modal-body">
              
                                      <div class="form-group">
                                        <label for="codigo">RUC</label>
                                        <input type="text" class="form-control" name="ruc" required>
                                      </div>
              
                                      <div class="form-group">
                                        <label for="nombre">Razon Social</label>
                                        <input type="text" class="form-control" name="razon_social" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Propietario</label>
                                        <input type="text" class="form-control" name="propietario">
                                      </div>
              
                                      <div class="form-group">
                                        <label for="nombre">Descripción</label>
                                        <textarea class="form-control" rows="5" name="descripcion">sin descripción</textarea>
                                      </div>
    
                                      <div class="form-group">
                                        <label for="nombre">Creada</label>
                                        <input type="date" class="form-control" name="fecha" required>
                                      </div>
              
                                    </div>
              
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                  </form>
                                
                            </div>
                          </div>
                          <!-- Modal para agregar Contrato -->


                        <table class="table table-striped table-advance table-hover">
          
                          <hr>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>RUC</th>
                              <th>Razon Social</th>
                              <th>Propietario</th>
                              <th>Descripcion</th>
                              <th>Creada</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $contador = 1
                            @endphp
                        @foreach ($pjuridicas->sortBy('razon_social') as $item)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$item->ruc}}</td>
                            <td>{{$item->razon_social}}</td>
                            <td>{{$item->propietario}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{date('d/m/Y', strtotime($item->fecha))}}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar-{{$item->id_persona_juridico}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id_persona_juridico}}"><i class="fa fa-trash-o "></i></button>
                          <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id_persona_juridico}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/empresa/{{$item->id_persona_juridico}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Empresa</h4>
                                </div>
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">RUC</label>
                                    <input type="text" class="form-control" name="ruc" value={{$item->ruc}}>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Razon social</label>
                                    <input type="text" class="form-control" name="razon_social" value="{{$item->razon_social}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Propietario</label>
                                    <input type="text" class="form-control" name="propietario" value="{{$item->propietario}}">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Descripción</label>
                                    <textarea name="descripcion" class="form-control" rows="5">{{$item->descripcion}}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Creada</label>
                                    <input type="text" class="form-control" value="{{date('d/m/Y', strtotime($item->fecha))}}" disabled>
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
                                <div class="modal fade" id="eliminar-{{$item->id_persona_juridico}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar: <strong>{{$item->razon_social}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("empresa/{$item->id_persona_juridico}") }}">
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
                  {{ $pjuridicas->links() }}
                </div>

                <div class="col-lg-12">
                    @if (session('estado'))
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          {{session('estado')}}
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
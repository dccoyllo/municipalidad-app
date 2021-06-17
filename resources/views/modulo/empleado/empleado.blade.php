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
                      <h4><i class="fa fa-angle-right"></i> Empleados</h4>
                      {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                      <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                          <!-- Modal para agregar Contrato -->
                           <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  <form class="modal-content" method="POST" action="/empleado">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Crear Empleado</h4>
                                    </div>
              
                                    <div class="modal-body">
              
                                      <div class="form-group">
                                        <label for="codigo">DNI</label>
                                        <input type="text" class="form-control" name="dni">
                                      </div>
              
                                      <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre">
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Apellido</label>
                                        <input type="text" class="form-control" name="apellido">
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Cargo</label>
                                        <input type="text" class="form-control" name="cargo">
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Oficina</label>
                                        <select name="id_oficina" class="form-control">
                                          <option value="">seleccione...</option>
                                          @foreach ($oficinas as $oficina)
                                            <option value="{{$oficina->id_oficina}}">{{$oficina->nombre}}</option>
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
                          <!-- Modal para agregar Contrato -->


                        <table class="table table-striped table-advance table-hover">
          
                          <hr>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>DNI</th>
                              <th>Apellidos y nombres</th>
                              <th>Cargo</th>
                              <th>Oficina</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $contador = 1
                            @endphp
                        @foreach ($empleados->sortBy('cod') as $item)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$item->dni}}</td>
                            <td>{{$item->apellido}}, {{$item->nombre}}</td>
                            <td>{{$item->cargo}}</td>
                            <td>{{$item->oficina->nombre}}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar-{{$item->id_empleado}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id_empleado}}"><i class="fa fa-trash-o "></i></button>
                          <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id_empleado}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/empleado/{{$item->id_empleado}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Oficina</h4>
                                </div>
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">DNI</label>
                                    <input type="text" class="form-control" name="dni" value={{$item->dni}}>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{$item->nombre}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" value="{{$item->apellido}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Cargo</label>
                                    <input type="text" class="form-control" name="cargo" value="{{$item->cargo}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Oficina</label>
                                    <select name="id_oficina" class="form-control">
                                      @foreach ($oficinas as $oficina)
                                          @if ($item->oficina->id_oficina == $oficina->id_oficina)
                                            <option value="{{$oficina->id_oficina}}" selected>{{$oficina->nombre}}</option>
                                            @endif
                                          @if ($item->oficina->id_oficina != $oficina->id_oficina)
                                            <option value="{{$oficina->id_oficina}}">{{$oficina->nombre}}</option>
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
                                <div class="modal fade" id="eliminar-{{$item->id_empleado}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar:<strong> {{$item->apellido}}, {{$item->nombre}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("empleado/{$item->id_empleado}") }}">
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
                <div class="col-lg-12">
                  @if (session('estado_empleado'))
                          @if (session('estado_empleado') == 1)
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
                
                @if (session('mensaje'))
                <div class="col-lg-12">
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{session('mensaje')}}
                  </div>
                </div>
              @endif
                
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
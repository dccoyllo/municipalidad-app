@extends('layout.layout')
@section('titulo', 'Persona')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
                <div class="col-lg-12">
                    {{-- <p>{{$oficinas}}</p> --}}

                    <div class="showback">
                      <h4><i class="fa fa-angle-right"></i> Personas</h4>
                      {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                      <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                          <!-- Modal para agregar Contrato -->
                           <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  <form class="modal-content" method="POST" action="/persona">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Crear Persona</h4>
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
                                        <label for="nombre">Apellido Paterno</label>
                                        <input type="text" class="form-control" name="apellido_pa">
                                      </div>          
                                      <div class="form-group">
                                        <label for="nombre">Apellido Materno</label>
                                        <input type="text" class="form-control" name="apellido_ma">
                                      </div>
    
                                      <div class="form-group">
                                        <label for="nombre">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fecha_nacimiento">
                                      </div>
    
                                      <div class="form-group">
                                        <label for="nombre">Sexo</label>
                                        <select name="sexo" class="form-control">
                                              <option selected>seleccione...</option>
                                              <option value="m">Masculino</option>
                                              <option value="f">Femenimo</option>
                                        </select>
                                      </div>
    
                                      <div class="form-group">
                                        <label for="nombre">Profesión</label>
                                        <input type="text" class="form-control" name="profesion">
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
                              <th>Fecha nacimiento</th>
                              <th>Sexo</th>
                              <th>Profesión</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $contador = 1
                            @endphp
                        @foreach ($pnatural->sortBy('nombre') as $item)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$item->dni}}</td>
                            <td>{{$item->apellido_pa}} {{$item->apellido_ma}}, {{$item->nombre}}</td>
                            <td>{{date('d/m/Y', strtotime($item->fecha_nacimiento))}}</td>
                            <td>{{$item->sexo}}</td>
                            <td>{{$item->profesion}}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar-{{$item->id_persona_natural}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id_persona_natural}}"><i class="fa fa-trash-o "></i></button>
                          <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id_persona_natural}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/persona/{{$item->id_persona_natural}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Persona</h4>
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
                                    <label for="nombre">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellido_pa" value="{{$item->apellido_pa}}">
                                  </div>          
                                  <div class="form-group">
                                    <label for="nombre">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellido_ma" value="{{$item->apellido_ma}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{$item->fecha_nacimiento}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Sexo</label>
                                    <select name="sexo" class="form-control">
                                      @if ($item->sexo == "m")
                                          <option selected value="m">Masculino</option>
                                          <option value="f">Femenimo</option>

                                      @endif
                                      @if ($item->sexo == "f")
                                      <option selected value="f">Femenino</option>
                                      <option value="m">Masculino</option>
                                          
                                      @endif
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Profesión</label>
                                    <input type="text" class="form-control" name="profesion" value="{{$item->profesion}}">
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
                                <div class="modal fade" id="eliminar-{{$item->id_persona_natural}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar a <strong>{{$item->apellido_pa}} {{$item->apellido_ma}}, {{$item->nombre}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("persona/{$item->id_persona_natural}") }}">
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
                  {{$pnatural->links()}}
                </div>
               
                  @if (session('estado'))
                  <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Success!</strong> {{session('estado')}}
                    </div>
                  </div>
                @endif
                
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
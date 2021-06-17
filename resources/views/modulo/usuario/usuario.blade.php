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
                      <h4><i class="fa fa-angle-right"></i> Administración de Usuarios y Roles</h4>
                      {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                      <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                          <!-- Modal para agregar Contrato -->
                           <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  <form class="modal-content" method="POST" action="/usuario">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
                                    </div>
              
                                    <div class="modal-body">
              
                                      <div class="form-group">
                                        <label for="codigo">Cuenta</label>
                                        <input type="text" class="form-control" name="cuenta">
                                      </div>
              
                                      <div class="form-group">
                                        <label for="nombre">Correo</label>
                                        <input type="text" class="form-control" name="email">
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Empleados</label>
                                        <select name="id_empleado" class="form-control">
                                          <option>seleccione...</option>
                                          @foreach ($empleados as $empleado)
                                          <option value="{{$empleado->id_empleado}}">{{$empleado->apellido}}, {{$empleado->nombre}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="nombre">Roles</label>
                                        <select name="id_rol" class="form-control">
                                          <option>seleccione...</option>
                                          @foreach ($roles as $rol)
                                          <option value="{{$rol->id_rol}}">{{$rol->nombre}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="codigo">Contraseña</label>
                                        <div class="row">
                                          <div class="col-lg-11">
                                            <input type="password" class="form-control" id="clave" onchange="clave1()">
                                          </div>
                                          <div class="col" id="mensaje1">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="codigo">Vuelva a escribir</label>
                                        <div class="row">
                                          <div class="col-lg-11">
                                        <input type="password" class="form-control" name="password" id="re_clave" onchange="validator()">
                                      </div>
                                      <div class="col" id="mensaje2">

                                      </div>
                                    </div>
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
                              <th>Cuenta</th>
                              <th>Correo</th>
                              <th>Empleado</th>
                              <th>Rol</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $contador = 1
                            @endphp
                        @foreach ($usuarios->sortBy('cod') as $item)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$item->cuenta}}</td>
                            <td>{{$item->email}}</td>
                            <td>@if ($item->UserEmpleado)
                              {{$item->UserEmpleado->empleado->apellido}}, {{$item->UserEmpleado->empleado->nombre}}
                            @endif</td>
                            <td>{{$item->UserRol->rol->nombre}}</td>
                            <td>
                              @if ($item->estado == 1)
                                <span class="label label-success">Conectado</span>
                                @else
                                <span class="label label-danger">Desconectado</span>
                              @endif
                            </td>
                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar-{{$item->id}}"><i class="fa fa-pencil"></i></button>
                                @if ($item->id != 1)
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id}}"><i class="fa fa-trash-o "></i></button>
                                @endif
                          <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/usuario/{{$item->id}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
                                </div>
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">Cuenta</label>
                                    <input type="text" class="form-control" name="cuenta" value={{$item->cuenta}}>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Correo</label>
                                    <input type="text" class="form-control" name="email" value="{{$item->email}}">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Empleado</label>
                                    <input type="text" class="form-control" disabled value=@if ($item->UserEmpleado)
                                    "{{$item->UserEmpleado->empleado->apellido}}, {{$item->UserEmpleado->empleado->nombre}}"
                                    @endif>
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Roles</label>
                                    <select name="id_rol" class="form-control">
                                      <option>seleccione...</option>
                                      @foreach ($roles as $rol)
                                      @if ($item->UserRol->rol->id_rol == $rol->id_rol)
                                        <option value="{{$rol->id_rol}}" selected>{{$rol->nombre}}</option>
                                        @else
                                        <option value="{{$rol->id_rol}}">{{$rol->nombre}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="codigo">Contraseña</label>
                                    <input type="password" class="form-control" name="password" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="codigo">Nueva Contraseña</label>
                                    <input type="password" class="form-control" name="new_password">
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
                                @if ($item->id != 1)
                                  <div class="modal fade" id="eliminar-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar la cuenta: <strong>{{$item->cuenta}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("usuario/{$item->id}") }}">
                                              @csrf
                                              @method('DELETE')
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                              <button type="submit" class="btn btn-primary">Aceptar</button>
                                            </form>
                                        </div>
                                    </div>
                                  </div>
                                @endif
                                <!-- Modal para eliminar Contrato -->
                            </td>
                        </tr>

                        @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /content-panel -->
                </div>

                @if (session('mensaje'))
                <div class="col-lg-12">
                    <div class="alert {{session('alerta')}} alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      {{session('mensaje')}}
                    </div>
                </div>
                @endif
                
            </div>
        </section>
        <script>
          function clave1(){
            var contenedor = document.getElementById("mensaje1");
            contenedor.innerHTML = '<span class="badge bg-success"><i class="fa fa-check"></i></span>';
          }
          function validator(){
            var contenedor2 = document.getElementById("mensaje2");
            var clave = document.getElementById('clave');
            var reclave = document.getElementById('re_clave');

            if (clave.value == reclave.value) {
            contenedor2.innerHTML = '<span class="badge bg-success"><i class="fa fa-check"></i></span>';
            } else {
            contenedor2.innerHTML = '<span class="badge bg-important"><i class="fa fa-times"></i></span>';
            }            
            console.log("escribiendo");
          }
        </script>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
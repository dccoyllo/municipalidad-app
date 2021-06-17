@extends('layout.layout')
@section('titulo', 'Inicio')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
                <div class="col-lg-12">
                    {{-- <p>{{$servicios}}</p> --}}

                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                          <h4><i class="fa fa-angle-right"></i> Servicios</h4>
          
          
                          <!-- boton para agregar Contrato -->
                          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#agregar_nuevo_contrato">Agregar Contratos</button>
                          <!-- boton para agregar Contrato -->
          
          
                          <!-- Modal para agregar Contrato -->
                          <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Agregar contrato</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
          
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="text" class="form-control" id="agregar_codigo_contrato" placeholder="Ingrese el codigo">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="agregar_nombre_contrato" placeholder="Ingrese el nombre">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" class="form-control" id="agregar_descripcion_contrato" placeholder="Ingrese la descripcion">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="impuesto">Impuesto</label>
                                    <input type="text" class="form-control" id="agregar_impuesto_contrato" placeholder="Ingrese el impuesto">
                                  </div>
          
                                  <div class="form-group">
                                    <label for="idServicio">ID Servicio</label>
                                    <select class="form-control" id="agregar_idservicio_contrato">
                                      <option>Activo</option>
                                      <option>Desactivo</option>
                                      <option>Fuera de linea</option>
                                    </select>
                                  </div>
          
                                  <div class="form-group">
                                    <label for="idContrato">ID Estado del contrato</label>
                                    <select class="form-control" id="agregar_idcontrato_contrato">
                                      <option>Supuestamente se jala</option>
                                      <option>con bd</option>
                                    </select>
                                  </div>
          
                                </div>
          
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <button type="button" class="btn btn-primary" id="agregar_contrato">Guardar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Modal para agregar Contrato -->
          
                          <hr>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Cod</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Descripcion</th>
                              <th>Rubro</th>
                              {{-- <th>Fecha Actualizado</th> --}}
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                        @foreach ($servicios as $item)
                        <tr>
                            <td>{{$item->id_servicio}}</td>
                            <td>{{$item->abreviatura}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{ 'S/'.number_format($item->tarifa, 2) }}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->rubro}}</td>
                            {{-- <td>{{$item->updated_at}}</td> --}}

                            <td>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modificar_contrato"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar_contrato"><i class="fa fa-trash-o "></i></button>

                                <!-- Modal para modificar Contrato -->
                                <div class="modal fade" id="modificar_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modificar contrato</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="codigo">Codigo</label>
                                            <input type="text" class="form-control" id="modificar_codigo_contrato" placeholder="Ingrese el codigo">
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="modificar_nombre_contrato" placeholder="Ingrese el nombre">
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" class="form-control" id="moficicar_descripcion_contrato" placeholder="Ingrese la descripcion">
                                        </div>

                                        <div class="form-group">
                                            <label for="impuesto">Impuesto</label>
                                            <input type="text" class="form-control" id="modificar_impuesto_contrato" placeholder="Ingrese el impuesto">
                                        </div>

                                        <div class="form-group">
                                            <label for="idServicio">ID Servicio</label>
                                            <select class="form-control" id="modificar_idservicio_contrato">
                                            <option>Activo</option>
                                            <option>Desactivo</option>
                                            <option>Fuera de linea</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="idContrato">ID Estado del contrato</label>
                                            <select class="form-control" id="modificar_idcontrato_contrato">
                                            <option>Supuestamente se jala</option>
                                            <option>con bd</option>
                                            </select>
                                        </div>

                                        </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="modificar_contrato">Guardar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- Modal para modificar Contrato -->

                                <!-- Modal para eliminar Contrato -->
                                <div class="modal fade" id="eliminar_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">

                                        Deseas eliminar a este Contrato?

                                        </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="eliminar_contrato">Aceptar</button>
                                        </div>
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
                </div>
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection

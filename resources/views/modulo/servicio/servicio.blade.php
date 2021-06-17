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
                      <h4><i class="fa fa-angle-right"></i> Servicios</h4>
                      {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                      <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                          <!-- Modal para agregar Contrato -->
                           <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  <form class="modal-content" method="POST" action="/servicio">
                                    @method('POST')
                                    @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Crear servicio</h4>
                                    </div>
              
                                    <div class="modal-body">
              
                                      <div class="form-group">
                                        <label for="codigo">Cod</label>
                                        <input type="text" class="form-control" name="abreviatura">
                                      </div>
              
                                      <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre">
                                      </div>
                        
                                      <div class="form-group">
                                        <label for="nombre">Descripción</label>
                                        <textarea class="form-control" name="descripcion" rows="5">sin descripción</textarea>
                                      </div>          
    
                                      <div class="form-group">
                                        <label for="nombre">Costo S/</label>
                                        <input type="number" class="form-control" name="tarifa">
                                      </div>
    
                                      <div class="form-group">
                                        <label for="nombre">Rubro</label>
                                        <input type="text" class="form-control" name="rubro">
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
                              <th>Cod</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Costo</th>
                              <th>Rubro</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                        @foreach ($servicios->sortBy('id_servicio') as $item)
                        <tr>
                            <td>{{$item->id_servicio}}</td>
                            <td>{{$item->abreviatura}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{ 'S/'.number_format($item->tarifa, 2) }}</td>
                            <td>{{$item->rubro}}</td>
                            <td>
                                {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar-{{$item->id_servicio}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id_servicio}}"><i class="fa fa-trash-o "></i></button>
                          <!-- Modal para editar oficina -->
                           <div class="modal fade" id="editar-{{$item->id_servicio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div  class="modal-dialog" role="document">
                                  
                              <form class="modal-content" method="POST" action="/servicio/{{$item->id_servicio}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Servicio</h4>
                                </div>
          
                                <div class="modal-body">
          
                                  <div class="form-group">
                                    <label for="codigo">Cod</label>
                                    <input type="text" class="form-control" name="abreviatura" value={{$item->abreviatura}}>
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
                                    <label for="nombre">Costo S/</label>
                                    <input type="number" class="form-control" name="tarifa" value="{{ $item->tarifa }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="nombre">Rubro</label>
                                    <input type="text" class="form-control" name="rubro" value="{{$item->rubro}}">
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
                                <div class="modal fade" id="eliminar-{{$item->id_servicio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar: <strong>{{$item->nombre}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("servicio/{$item->id_servicio}") }}">
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
                  {{$servicios->links()}}
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
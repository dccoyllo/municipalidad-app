@extends('layout.layout')
@section('titulo', 'Oficina')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
                <div class="col-lg-12">
                      <div class="showback">
                        <h4><i class="fa fa-angle-right"></i> Contribuyentes</h4>
                        {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button>

                            <!-- Modal para agregar Contrato -->
                            <div class="modal fade" id="agregar_nuevo_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                              <div  class="modal-dialog" role="document">
                                    <form class="modal-content" method="POST" action="/oficina">
                                      @method('POST')
                                      @csrf
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Crear Oficina</h4>
                                      </div>
                
                                      <div class="modal-body">
                
                                        <div class="form-group">
                                          <label for="codigo">Codigo</label>
                                          <input type="text" class="form-control" name="cod">
                                        </div>
                
                                        <div class="form-group">
                                          <label for="nombre">Nombre</label>
                                          <input type="text" class="form-control" name="nombre">
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
                                <th>DNI / RUC</th>
                                <th>Contribuyente</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Referencia</th>
                                <th>Fecha Actualizada</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                          @foreach ($contribuyentes as $item)
                          <tr>
                              <td>{{$item->id_contribuyente}}</td>
                              <td>
                                @if ($item->ContribuyenteDNI)
                                {{$item->ContribuyenteDNI->personaNatural->dni}}
                                @else
                                    @if ($item->ContribuyenteRUC)
                                        {{$item->ContribuyenteRUC->personaJuridica->ruc}}
                                    @endif
                                @endif
                              </td>
                              <td>
                                @if ($item->ContribuyenteDNI)
                                {{$item->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->ContribuyenteDNI->personaNatural->nombre}}
                                @else
                                    @if ($item->ContribuyenteRUC)
                                        {{$item->ContribuyenteRUC->personaJuridica->razon_social}}
                                    @endif
                                @endif
                              </td>
                              {{-- <td>{{$item->personaNatural->dni}}</td> --}}
                              {{-- <td>{{$item->personaNatural->apellido_pa}} {{$item->personaNatural->apellido_ma}}, {{$item->personaNatural->nombre}}</td> --}}
                            
                              <td>{{$item->numero_telefonico}}</td>
                              <td>{{$item->direccion}}</td>
                              <td>{{$item->referencia}}</td>
                              <td>{{date('d/m/Y', strtotime($item->updated_at))}}</td>
                              <td>
                                  {{-- <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}/edit"><i class="fa fa-pencil"></i></a> --}}
                                  <button class="btn btn-primary btn-xs" title="editar" data-toggle="modal" data-target="#editar-{{$item->id_contribuyente}}"><i class="fa fa-pencil"></i></button>
                            <!-- Modal para editar oficina -->
                            <div class="modal fade" id="editar-{{$item->id_contribuyente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                              <div  class="modal-dialog" role="document">
                                    
                                <form class="modal-content" method="POST" action="/contribuyente/{{$item->id_contribuyente}}">
                                  @method('PUT')
                                  @csrf
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Editar Contribuyente</h4>
                                  </div>
            
                                  <div class="modal-body">
            
                                    <div class="form-group">
                                      <label for="codigo">DNI / RUC</label>
                                      <input type="text" class="form-control" disabled value=@if ($item->ContribuyenteDNI)
                                      "{{$item->ContribuyenteDNI->personaNatural->dni}}"
                                      @else
                                          @if ($item->ContribuyenteRUC)
                                              "{{$item->ContribuyenteRUC->personaJuridica->ruc}}"
                                          @endif
                                      @endif>
                                    </div>

                                    <div class="form-group">
                                      <label for="contribuyente">Contribuyente</label>
                                      <input type="text" class="form-control" disabled value=@if ($item->ContribuyenteDNI)
                                      "{{$item->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->ContribuyenteDNI->personaNatural->nombre}}"
                                      @else
                                          @if ($item->ContribuyenteRUC)
                                              "{{$item->ContribuyenteRUC->personaJuridica->razon_social}}"
                                          @endif
                                      @endif>
                                    </div>
            
                                    <div class="form-group">
                                      <label for="nombre">Telefono</label>
                                      <input type="text" class="form-control" name="numero_telefonico" value="{{$item->numero_telefonico}}">
                                    </div>

                                    <div class="form-group">
                                      <label for="nombre">Dirección</label>
                                      <input type="text" class="form-control" name="direccion" value="{{$item->direccion}}">
                                    </div>

                                    <div class="form-group">
                                      <label for="nombre">Referencia</label>
                                      <input type="text" class="form-control" name="referencia" value="{{$item->referencia}}">
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
                            
                              </td>
                          </tr>

                          @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /content-panel -->                          
                      </div>
                </div>

                <div class="col-lg-12 text-center">
                  {{$contribuyentes->links()}}

                </div>
                <div class="col-lg-12">
                  @if (session('estado'))
                      <div class="alert {{session('alert')}} alert-dismissable">
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
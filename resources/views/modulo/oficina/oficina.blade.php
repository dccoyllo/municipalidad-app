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

                    {{-- <div class="showback">
                      <h4><i class="fa fa-angle-right"></i> Basic Buttons</h4>
                      <button type="button" class="btn btn-default">Default</button>
                      <button type="button" class="btn btn-primary">Primary</button>
                      <button type="button" class="btn btn-success">Success</button>
                      <button type="button" class="btn btn-info">Info</button>
                      <button type="button" class="btn btn-warning">Warning</button>
                      <button type="button" class="btn btn-danger">Danger</button>
                    </div> --}}
                    <div class="showback">
                      <h4><i class="fa fa-angle-right"></i> Oficinas</h4>
                      <a href="/oficina/create" class="btn btn-primary">Crear</a>

                        <table class="table table-striped table-advance table-hover">
          
                          <hr>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                        @foreach ($oficinas as $item)
                        <tr>
                            <td>{{$item->id_oficina}}</td>
                            <td>{{$item->cod}}</td>

                            <td>{{$item->nombre}}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="/oficina/{{$item->id_oficina}}"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar-{{$item->id_oficina}}"><i class="fa fa-trash-o "></i></button>
                                <!-- Modal para eliminar Contrato -->
                                <div class="modal fade" id="eliminar-{{$item->id_oficina}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                          </div>

                                            <div class="modal-body">
                                            Deseas eliminar: <strong>{{$item->nombre}}</strong>
                                            </div>

                                            <form class="modal-footer" method="POST" action="{{ url("oficina/{$item->id_oficina}") }}">
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
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
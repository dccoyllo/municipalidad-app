@extends('layout.layout')
@section('titulo', 'Oficina')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
                <div class="col-sm-12 col-lg-5">
                    {{-- <p>{{$oficinas}}</p> --}}
                    <form class="modal-content" method="POST" action="/oficina">
                      @method('POST')
                      @csrf
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Oficina</h4>
                      </div>

                      <div class="modal-body">

                        <div class="form-group">
                          <label for="codigo">Codigo</label>
                          <input type="number" class="form-control" name="cod">
                        </div>

                        <div class="form-group">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" name="nombre">
                        </div>

                      </div>

                      <div class="modal-footer">
                        <a class="btn btn-secondary" href={{ url('oficina') }}>Volver</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>

                </div>
                <div class="col-lg-12">
                  <div class="row mt">
                    <div class="col-sm-12 col-lg-5">

                        @if (session('estado'))
                          @if (session('estado') == 1)
                          <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Success!</strong> Se ha creado correctamente.
                          </div>
                          @else
                          <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error!</strong> No se ha podido crear.
                          </div>
                          @endif
                      @endif
                      
                    </div>
                  </div>
              </div>
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
@extends('layout.layout')
@section('titulo', 'Oficina - crear')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
                <div class="col-sm-12 col-lg-6">
                    {{-- <p>{{$oficinas}}</p> --}}
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Oficina</h4>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=window.location="{{ URL::previous() }}">Volver</button>
                        <button type="button" class="btn btn-primary" id="agregar_contrato">Guardar</button>
                      </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
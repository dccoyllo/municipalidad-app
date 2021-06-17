@extends('layout.layout')
@section('titulo', 'Nuevo Contribuyente')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
              <div class="col-lg-8 col-lg-offset-2 detailed">
                <h4 class="mb">Nuevo Contribuyente</h4>
                <form role="form" class="form-horizontal" action="/contribuyente" method="POST">
                  @method('POST')
                  @csrf
                  <div class="form-group">
                    <label class="col-lg-2 control-label">DNI / RUC</label>
                    <div class="col-lg-6">
                      <input type="hidden" name="id_contribuyente" id="id_contribuyente">
                      <input type="hidden" name="id_tipo_identificacion" id="id_tipo_identificacion">
                      <div class="row">
                        <div class="col-lg-8">
                          <input type="text" id="query" class="form-control" onchange="buscador()">
                        </div>
                        <div class="col-lg-4">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verificar"><i class="fa fa-check"></i> Verificar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal para verificar contribuyente -->
                  <div class="modal fade" id="verificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Verificar datos</h3>
                          </div>
                            <div class="modal-body">
                            <p>Contribuyente: <strong id="contenedor"></strong></p>
                            </div>
                            <div class="modal-footer">      
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Correcto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para verificar Contribuyente -->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono</label>
                    <div class="col-lg-6">
                      <input type="text" name="telefono" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección</label>
                    <div class="col-lg-6">
                      <input type="text" name="direccion" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Referencia</label>
                    <div class="col-lg-6">
                      <input type="text" name="referencia" class="form-control" value="ninguna">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Crear</button>
                      <button class="btn btn-theme04" type="reset">Resetear</button>
                    </div>
                  </div>
                </form>
              </div>
              
              @if (session('estado'))
                  <div class="col-lg-12 text-center">
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <b>Success!</b> {{session('estado')}}</div>
                </div>
              @endif
                
                
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <script>

      function buscador(){
        var query = document.getElementById('query');
        var id_contribuyente = document.getElementById('id_contribuyente');
        var id_tipo_identificacion = document.getElementById('id_tipo_identificacion');
        var contenedor = document.getElementById('contenedor');

        var personas = @json($personas);
        var empresas = @json($empresas);

        // console.log(personas);
        // console.log(empresas);

        personas.forEach(items => {
          if(items.dni == query.value){
            contenedor.innerText = `${items.apellido_pa} ${items.apellido_ma}, ${items.nombre}`;
            id_contribuyente.setAttribute('value', items.id_persona_natural);
            id_tipo_identificacion.setAttribute('value', 1);
            console.log(items);
          }
        });
        empresas.forEach(items => {
          if(items.ruc == query.value){
            contenedor.innerText = items.razon_social;
            id_contribuyente.setAttribute('value', items.id_persona_juridico);
            id_tipo_identificacion.setAttribute('value', 2);
            console.log(items);
          }
        });

        // if(q.value == ""){
        //       id.setAttribute('value', 0);
        //       datos.innerText = "no se encontró.";
        //   }
            
      }
      function dataServicio(){
        servicio = document.getElementById("servicio");
        precio = document.getElementById("precio_servicio");
        codigo = document.getElementById("codigo");
        console.log(servicio.value);

      }

      function sumar(){
        let costo_servicio = document.getElementById('precio_servicio');
        let costo_impuesto = document.getElementById('impuesto');
        let contenedor_total = document.getElementById('total');
        let impuesto_total = document.getElementById('impuesto_total');

        let total = parseFloat(costo_servicio.value) + parseFloat(costo_impuesto.value);
        contenedor_total.setAttribute('value', total.toFixed(2));
        impuesto_total.setAttribute('value', total.toFixed(2));
        console.log("total: " + total.toFixed(2));
      }
  </script>
  

    <!--main content end-->
@endsection
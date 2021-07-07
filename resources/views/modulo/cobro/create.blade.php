@extends('layout.layout')
@section('titulo', 'Nuevo Contrato')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
              <div class="col-lg-8 col-lg-offset-2 detailed">
                <h4 class="mb">Agregar Cobros de Arbitrios</h4>
                <form role="form" class="form-horizontal" action={{route('arbitrios')}} method="POST">
                  @method('POST')
                  @csrf
                  
                  <div class="form-group">
                    <label class="col-lg-2 control-label">DNI / RUC del contribuyente</label>
                    <div class="col-lg-6">
                        <div class="row">
                          <div class="col-sm-8">
                            <input type="hidden" id="id_contribuyente" name="id_contribuyente">
                            <input type="text" id="query" class="form-control" onchange="buscador()" required>
                          </div>
                          <div class="col-sm-4">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verificar"><i class="fa fa-check"></i> Verificar</button>
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
                                <p>Contribuyente: <strong id="datos"></strong></p>
                                </div>
                                <div class="modal-footer">      
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Correcto</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Precio Mensual (S/)</label>
                    <div class="col-lg-6">
                      <input type="number" id="precio_mensual" name="precio_mensual" class="form-control" onchange="calcular()" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Precio Anual (S/)</label>
                    <div class="col-lg-6">
                      <input type="hidden" id="precio_anual" name="precio_anual">
                      <input type="number" id="ver_precio_anual" class="form-control" disabled>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                      <textarea rows="10" cols="30" class="form-control" name="descripcion">sin descripción</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Agregar</button>
                      <button class="btn btn-theme04" type="reset">Resetear</button>
                    </div>
                  </div>
                </form>
              </div>
              
              @if (session('msg'))
                  <div class="col-lg-12 text-center">
                    <div class="alert alert-success">{{session('msg')}}</div>
                </div>
              @endif
                
                
            </div>
        </section>
        <!-- /wrapper -->
    </section>

    <script>
        function buscador(){
        var q = document.getElementById('query');
        var id = document.getElementById('id_contribuyente');
        var datos = document.getElementById('datos');

        if(q.value == ""){
              id.setAttribute('value', 0);
              datos.innerText = "no se encontró.";
          }

          let contribuyentes = @json($contribuyentes);
          contribuyentes.forEach(contribuyente => {
            if (contribuyente.contribuyente_d_n_i) {

                if (q.value == contribuyente.contribuyente_d_n_i.persona_natural.dni) {
                    id.setAttribute('value', contribuyente.id_contribuyente);
                    console.log(contribuyente.id_contribuyente);
                    console.log(contribuyente.contribuyente_d_n_i.persona_natural.dni);
                    datos.innerText =`${contribuyente.contribuyente_d_n_i.persona_natural.apellido_pa} ${contribuyente.contribuyente_d_n_i.persona_natural.apellido_ma}, ${contribuyente.contribuyente_d_n_i.persona_natural.nombre}`;
                }

            }
            if (contribuyente.contribuyente_r_u_c) {

              if (q.value == contribuyente.contribuyente_r_u_c.persona_juridica.ruc) {
                  id.setAttribute('value', contribuyente.id_contribuyente);
                  console.log(contribuyente.contribuyente_r_u_c.persona_juridica.ruc);
                  datos.innerText = contribuyente.contribuyente_r_u_c.persona_juridica.razon_social;
              }

            }
          });

      }

      function calcular(){
        var pmensual = document.getElementById('precio_mensual');
        var panual = document.getElementById('precio_anual');
        var vpAnual = document.getElementById('ver_precio_anual');

        var total = pmensual.value *12;

        panual.setAttribute('value', total);
        vpAnual.setAttribute('value', total);

      }
    </script>

    <!--main content end-->
@endsection
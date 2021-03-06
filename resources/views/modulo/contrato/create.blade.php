@extends('layout.layout')
@section('titulo', 'Nuevo Contrato')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
              <div class="col-lg-8 col-lg-offset-2 detailed">
                <h4 class="mb">Nuevo Contrato</h4>
                <form role="form" class="form-horizontal" action="/contrato" method="POST">
                  @method('POST')
                  @csrf
                  <div class="form-group">
                    <label class="col-lg-2 control-label"> Codigo</label>
                    <div class="col-lg-6">
                      <input type="hidden" name="cod" id="codigo">
                      <input type="text" id="number-generator" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-6">
                      <input type="text" name="nombre" class="form-control" required>
                    </div>
                  </div>
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
                    <label class="col-lg-2 control-label">Servicio</label>
                    <div class="col-lg-6">
                      <select class="form-control" name="id_servicio" id="servicio" onchange="dataServicio()" required>
                        <option selected>seleccione...</option>
                        @foreach ($servicios as $item)
                        
                        <option value={{$item->id_servicio}}>{{$item->nombre}}</option>
                       
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Fecha</label>
                    <div class="col-lg-6">
                      <input class="form-control" type="date" name="fecha" required>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Costo del Servicio (S/)</label>
                    <div class="col-lg-6">
                      <input type="text" id="precio_servicio" class="form-control" value="0.00" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Costo extra (S/)</label>
                    <div class="col-lg-6">
                      <input type="number" id="impuesto" class="form-control" onchange="sumar()" min="0" value="0.00">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Costo Total (S/)</label>
                    <div class="col-lg-6">
                      <input type="hidden" name="impuesto" id="impuesto_total">
                      <input type="text" id="total" class="form-control" value="0.00" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                      <textarea rows="10" cols="30" class="form-control" name="descripcion">sin descripci??n</textarea>
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
                    <div class="alert alert-success"><b>Success!</b> {{session('estado')}}</div>
                </div>
              @endif
                
                
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <script>

      var caracteres = "ABC01234abc56789";
          var cod = "";
          var conte = document.getElementById('number-generator');
          for (i=0; i<4; i++) cod +=caracteres.charAt(Math.floor(Math.random()*caracteres.length)); 
          // console.log(contrase??a)
          console.log(cod);
          conte.setAttribute('value', cod);
      
      function buscador(){
        var q = document.getElementById('query');
        var id = document.getElementById('id_contribuyente');
        var datos = document.getElementById('datos');

        if(q.value == ""){
              id.setAttribute('value', 0);
              datos.innerText = "no se encontr??.";
          }

          let contribuyentes = @json($contribuyentes);
          contribuyentes.forEach(contribuyente => {
            if (contribuyente.contribuyente_d_n_i) {

                if (q.value == contribuyente.contribuyente_d_n_i.persona_natural.dni) {
                    id.setAttribute('value', contribuyente.id_contribuyente);
                    // console.log(contribuyente.id_contribuyente);
                    // console.log(contribuyente.contribuyente_d_n_i.persona_natural.dni);
                    datos.innerText =`${contribuyente.contribuyente_d_n_i.persona_natural.apellido_pa} ${contribuyente.contribuyente_d_n_i.persona_natural.apellido_ma}, ${contribuyente.contribuyente_d_n_i.persona_natural.nombre}`;
                }

            }
            if (contribuyente.contribuyente_r_u_c) {

              if (q.value == contribuyente.contribuyente_r_u_c.persona_juridica.ruc) {
                  id.setAttribute('value', contribuyente.id_contribuyente);
                  // console.log(contribuyente.contribuyente_r_u_c.persona_juridica.ruc);
                  datos.innerText = contribuyente.contribuyente_r_u_c.persona_juridica.razon_social;
              }

            }
          });

      }
      function dataServicio(){
        servicio = document.getElementById("servicio");
        precio = document.getElementById("precio_servicio");
        codigo = document.getElementById("codigo");
        console.log(servicio.value);
        @foreach ($servicios as $item)
          if("{{$item->id_servicio}}" == servicio.value){
            console.log("{{$item->tarifa}}");
            conte.setAttribute('value', "{{$item->abreviatura}}" + "-" + cod);
            precio.setAttribute('value', "{{number_format($item->tarifa, 2) }}");
            codigo.setAttribute('value', "{{$item->abreviatura}}"+ "-" + cod);
          }
        @endforeach

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
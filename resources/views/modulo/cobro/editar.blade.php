@extends('layout.layout')
@section('titulo', 'Oficina')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
              <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i> Cobrar Arbitrios</h4>
                <div class="form-panel">
                  <div class="form">
                    <form class="cmxform form-horizontal style-form" method="POST" action={{route('arbitrios-update', $cobroArbitrio->id_cobro_arbitrio)}}>
                      @csrf
                      @method('PUT')
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">DNI / RUC</label>
                        <div class="col-lg-4">
                          <input class=" form-control" id="cname" minlength="2" type="text" disabled value=@if ($cobroArbitrio->Contribuyente->ContribuyenteDNI)
                          {{$cobroArbitrio->Contribuyente->ContribuyenteDNI->personaNatural->dni}}
                          @else
                              @if ($cobroArbitrio->Contribuyente->ContribuyenteRUC)
                                  {{$cobroArbitrio->Contribuyente->ContribuyenteRUC->personaJuridica->ruc}}
                              @endif
                          @endif>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Contribuyente</label>
                        <div class="col-lg-4">
                          <input class=" form-control" id="cname" minlength="2" type="text" value=@if ($cobroArbitrio->Contribuyente->ContribuyenteDNI)
                          "{{$cobroArbitrio->Contribuyente->ContribuyenteDNI->personaNatural->apellido_pa}} {{$cobroArbitrio->Contribuyente->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$cobroArbitrio->Contribuyente->ContribuyenteDNI->personaNatural->nombre}}"
                          @else
                              @if ($cobroArbitrio->Contribuyente->ContribuyenteRUC)
                                  "{{$cobroArbitrio->Contribuyente->ContribuyenteRUC->personaJuridica->razon_social}}"
                              @endif
                          @endif disabled>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Precio Mensual (S/)</label>
                        <div class="col-lg-4">
                          <input class=" form-control" id="cname" minlength="2" type="text" value={{ number_format($cobroArbitrio->precio_mensual, 2) }} disabled>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Tipo Pago</label>
                        <div class="col-lg-4">
                          <select class="form-control" name="tipo_pago">
                            <option value="Mensual">Mensual</option>
                            <option value="Anual">Anual</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Pago Actual (S/)</label>
                        <div class="col-lg-4">
                          <input class=" form-control" type="number" name="pago_actual" value={{ number_format($cobroArbitrio->pago_actual, 2) }}>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Descripción</label>
                        <div class="col-lg-6">
                          <textarea class="form-control" rows="10" disabled>{{$cobroArbitrio->descripcion}}</textarea>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Fecha de Pago</label>
                        <div class="col-lg-4">
                          <input class="form-control " id="cemail" type="date" name="fecha_pago" required="">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-theme" type="submit">Cobrar</button>
                          <a class="btn btn-theme04" href={{route('arbitrios')}}>Volver</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /form-panel -->
              </div>

              @if (session('msg'))
                <div class="col-lg-12">
                  <div class="alert alert-success">{{session('msg')}}</div>
                </div>
              @endif
              
                  
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
@extends('layout.layout')
@section('titulo', 'Detalles Arbitrios')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row mt">
              
                <div class="col-lg-12">
                      <div class="showback">
                        <h4><i class="fa fa-angle-right"></i> Cobros de Arbitrios</h4>
                        {{-- <button href="/oficina/create" class="btn btn-primary" data-toggle="modal" data-target="#agregar_nuevo_contrato">Crear</button> --}}

                          <table class="table table-striped table-advance table-hover">
            
                            <hr>
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>DNI / RUC</th>
                                {{-- <th>Contribuyente</th> --}}
                                <th>Tipo de Pago</th>
                                <th>Precio Mensual</th>
                                <th>Precio Anual</th>
                                <th>Precio Actual</th>
                                <th>Primer Pago</th>
                                <th>Último Pago</th>
                                <th>Estado</th>
                                <th>Cobrar</th>
                              </tr>
                            </thead>
                            <tbody>
                          @foreach ($cobroArbitrios as $item)
                          <tr>
                              <td>{{$item->id_cobro_arbitrio}}</td>

                              <td>
                                @if ($item->Contribuyente->ContribuyenteDNI)
                                {{$item->Contribuyente->ContribuyenteDNI->personaNatural->dni}}
                                @endif
                                @if ($item->Contribuyente->ContribuyenteRUC)
                                        {{$item->Contribuyente->ContribuyenteRUC->personaJuridica->ruc}}
                                @endif
                              </td>
                              {{-- <td>
                                @if ($item->Contribuyente->ContribuyenteDNI)
                                {{$item->Contribuyente->ContribuyenteDNI->personaNatural->apellido_pa}} {{$item->Contribuyente->ContribuyenteDNI->personaNatural->apellido_ma}}, {{$item->Contribuyente->ContribuyenteDNI->personaNatural->nombre}}
                                @else
                                    @if ($item->Contribuyente->ContribuyenteRUC)
                                        {{$item->Contribuyente->ContribuyenteRUC->personaJuridica->razon_social}}
                                    @endif
                                @endif
                              </td> --}}
                              {{-- <td>{{$item->personaNatural->dni}}</td> --}}
                              {{-- <td>{{$item->personaNatural->apellido_pa}} {{$item->personaNatural->apellido_ma}}, {{$item->personaNatural->nombre}}</td> --}}
                            
                              <td>{{$item->tipo_pago}}</td>
                              <td>{{ 'S/'.number_format($item->precio_mensual, 2)}}</td>
                              <td>{{ 'S/'.number_format($item->precio_anual, 2)}}</td>
                              <td>{{$item->pago_actual ? 'S/'.number_format($item->pago_actual, 2) : "-"}}</td>
                              <td>
                                  {{$item->fecha_primer_pago ? date('d/M/Y', strtotime($item->fecha_primer_pago)) : "-"}}
                              </td>
                              <td>
                                {{$item->fecha_ultimo_pago ? date('d/M/Y', strtotime($item->fecha_ultimo_pago)) : "-"}}
                              </td>
                              <td>
                                @if ($item->estado == 'Pendiente')
                                  <span class="label label-warning">{{$item->estado}}</span>
                                @endif
                                @if ($item->estado == 'Pagado')
                                  <span class="label label-success">{{$item->estado}}</span>
                                @endif
                              </td>

                              <td>
                                  @if ($item->estado == 'Pendiente')
                                      <a class="btn btn-default btn-xs" href={{route('arbitrios')."/".$item->id_cobro_arbitrio."/edit"}}><i class="fa fa-eye"></i></a>
                                  @endif
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
                  {{$cobroArbitrios->links()}}

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
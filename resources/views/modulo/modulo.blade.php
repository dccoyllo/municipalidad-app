@extends('layout.layout')
@section('titulo', 'Inicio')
@section('body')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Blank Page</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>Place your content here.</p>
                    <p>{{$modulos}}</p>
                </div>
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!--main content end-->
@endsection
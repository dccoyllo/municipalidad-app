<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="narmeshit">
    <meta name="keyword" content="">
    <title>Muni - @yield('titulo')</title>

    <!-- Bootstrap core CSS -->
    <link href={{ url('lib/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <!--external css-->
    <link href={{ url('lib/font-awesome/css/font-awesome.css') }} rel="stylesheet" />
    <link href={{ url('lib/bootstrap-datepicker/css/datepicker.css') }} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{ url('css/style.css') }} rel="stylesheet">
    <link href={{ url('css/style-responsive.css') }} rel="stylesheet">

</head>

<body>
    <div id="container">
        {{-- Header --}}
        @include('layout.header')
        {{-- Modulo --}}
        @include('layout.modulo')
        {{-- body --}}
        @yield('body')
        {{-- Footer --}}
        @include('layout.footer')
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src={{ url('lib/jquery/jquery.min.js') }}></script>
    <script src={{ url('lib/bootstrap/js/bootstrap.min.js') }}></script>
    <script src={{ url('lib/jquery-ui-1.9.2.custom.min.js') }}></script>
    <script src={{ url('lib/jquery.ui.touch-punch.min.js') }}></script>
    <script class="include" type="text/javascript" src={{ url('lib/jquery.dcjqaccordion.2.7.js') }}></script>
    <script src={{ url('lib/jquery.scrollTo.min.js') }}></script>
    <script src={{ url('lib/jquery.nicescroll.js') }} type="text/javascript"></script>
    <!--common script for all pages-->
    <script src={{ url('lib/common-scripts.js') }}></script>
    <!--script for this page-->

</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muni - @yield('titulo')</title>
</head>

<body>
    {{-- Header --}}
    @include('layout.header')
    {{-- body --}}
    @yield('body')
    {{-- Footer --}}
    @include('layout.footer')

</body>

</html>

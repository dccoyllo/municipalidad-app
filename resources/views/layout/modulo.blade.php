<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            @foreach (auth()->user()->empleado()->get() as $empleado)
                <h5 class="centered">{{ $empleado->NOMBRE }}</h5>
            @endforeach
            @foreach (auth()->user()->rol()->get() as $rol)
                <h6 class="centered">{{ $rol->NOMBRE }}</h6>
            @endforeach

            @foreach (auth()->user()->rol()->get() as $rol)
                <h6 class="centered">{{ $rol->ID_ROL }}</h6>
            @endforeach
            {{-- <p>{{ Session::get('modulo') }}</p> --}}
            <p>{{ session('modulo') }}</p>

            @foreach ( session('modulo') as $rol_modulo)
                <h6 class="centered">{{ $rol_modulo->rol()->get()}}</h6>
                
            @endforeach
            

            <li>
                <a href="index.html" class="active">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                    <span>Servicio</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a href="general.html">General</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="panels.html">Panels</a></li>
                    <li><a href="font_awesome.html">Font Awesome</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

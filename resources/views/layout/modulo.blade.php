<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered">{{ auth()->user()->empleado->NOMBRE }}</h5>
            <h6 class="centered">{{ auth()->user()->rol->NOMBRE }}</h6>

            {{-- <p>{{ Session::get('rolmodulo')->NOMBRE }}</p> --}}

            {{-- <p>{{ session('modulo') }}</p>
            <p class="centered">{{ auth()->user()->rol->ID_ROL }}</p>

            <p>{{ session('rolmodulo') }}</p> --}}

            {{-- @foreach ( session('rolmodulo') as $rol_modulo)
                <h6 class="centered">{{ $rol_modulo->modulo}}</h6>
            @endforeach --}}
            
            <li>
                <a href="/" class="active">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            @foreach ( session('rolmodulo') as $rol_modulo)

                @if ($rol_modulo->ID_ROL == auth()->user()->rol->ID_ROL)
                    @foreach ( session('modulo') as $modulo)

                        @if ($modulo->ID_MODULO == $rol_modulo->ID_MODULO)
                            <li>
                                <a href={{ $modulo->URL }}>
                                    <i class="fa {{ $modulo->ICONO }}"></i>
                                    <span>{{ $modulo->NOMBRE}}</span>
                                </a>
                            </li>
                        @endif

                    @endforeach
                
                @endif
                
            @endforeach

            {{-- @foreach ( session('rolmodulo') as $rol_modulo)
                <h6 class="centered">{{ $rol_modulo}}</h6>
            @endforeach
             --}}

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

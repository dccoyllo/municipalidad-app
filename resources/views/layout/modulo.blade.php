<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>

        {{-- @foreach (session('user_empleado') as $item)
            @if ($item->user == auth()->user())
                @foreach ($item->empleado()->get() as $item2)
                    <h5 class="centered">{{$item2->nombre}}</h5>
                @endforeach
        @endif --}}
        @foreach (session('user_empleado') as $item)
            @if ($item->user == auth()->user())
                <h5 class="centered">{{$item->empleado->nombre}}</h5>
        @endif
        @endforeach
        @foreach (session('user_rol') as $item)
            @if ($item->user == auth()->user())
                <h6 class="centered">{{$item->rol->nombre}}</h6>
            @endif
        @endforeach
        <p class="centered">
            @if (auth()->user()->estado != 0)
            <span class="label label-success">Conectado</span>
            @else
            <span class="label label-danger">Desconectado</span>
            @endif
        </p>

        <li>
            <a href="/" class="active">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
            </a>
        </li>

        @foreach (session('rol_modulo') as $rol_modulo)
            @foreach (session('user_rol') as $user_rol)
                @if ($user_rol->user == auth()->user())
                    @if ($rol_modulo->id_rol == $user_rol->rol->id_rol)
                        @foreach ($rol_modulo->modulo()->get() as $modulo)
                            <li>
                                <a href={{$modulo->url}}>
                                    <i class="fa {{$modulo->icon}}"></i>
                                    <span>{{$modulo->nombre}}</span>
                                </a>
                            </li>
                            {{-- <p>{{$modulo->nombre}}</p> --}}
                        @endforeach
                    @endif
                @endif
            @endforeach
        @endforeach
            
            {{-- <h5 class="centered">{{ auth()->user()->empleado->nombre }}</h5> --}}
            {{-- <h6 class="centered">{{ auth()->user()->rol->nombre }}</h6> --}}

            {{-- <p>{{ Session::get('rolmodulo')->NOMBRE }}</p> --}}

            {{-- <p>{{ session('modulo') }}</p>
            <p class="centered">{{ auth()->user()->rol->ID_ROL }}</p>--}}
            

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

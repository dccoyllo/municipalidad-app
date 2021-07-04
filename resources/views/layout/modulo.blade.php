<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><img src={{ url('img/ui-sam.jpg') }} class="img-circle" width="80"></p>
            {{-- @foreach (session('user_empleado') as $item)
                @if ($item->user == auth()->user())
                    @foreach ($item->empleado()->get() as $item2)
                        <h5 class="centered">{{$item2->nombre}}</h5>
                    @endforeach
            @endif --}}
            @if (auth()->user()->UserEmpleado)
            <h5 class="centered">{{auth()->user()->UserEmpleado->empleado->nombre}}</h5>
            @endif
            <h6 class="centered">{{auth()->user()->UserRol->rol->nombre}}</h6>
            <p class="centered">
                @if (auth()->user()->estado != 0)
                <span class="label label-success">Conectado</span>
                @else
                <span class="label label-danger">Desconectado</span>
                @endif
            </p>

            {{-- <li>
                <a href="/">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li> --}}

            @foreach (auth()->user()->UserRol->rol->RolModulo as $item)
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="{{$item->modulo->icono}}"></i>
                        <span>{{$item->modulo->nombre}}</span>
                    </a>
                    <ul class="sub">
                        @foreach ($item->modulo->submodulo as $submodulo)
                            <li><a href={{ url($submodulo->url) }}>{{$submodulo->nombre}}</a></li>
                        @endforeach
                    </ul>
                </li> 

               {{-- <li class="sub-menu">
                   <a href="javascript:;">
                       <i class="{{$modulo->icono}}"></i>
                       <span>{{$modulo->nombre}}</span>
                   </a>
                   <ul class="sub">
                       @foreach ($modulo->submodulo as $submodulo)
                           <li><a href={{ url($submodulo->url) }}>{{$submodulo->nombre}}</a></li>
                       @endforeach
                   </ul>
               </li> --}}
            @endforeach
        
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

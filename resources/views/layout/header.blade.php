    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/" class="logo"><b>SC <span>arbitrios</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- notification dropdown start-->
          


        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          {{-- <li> <p class="logout">{{auth()->user()->estado}}</p></li> --}}
          <li><a class="logout" href={{ route('logout') }}><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->

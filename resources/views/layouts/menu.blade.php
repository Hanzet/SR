<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                @if (Auth::user()->rol_id == 3)

                    <li class="menu-title"><span>Usuario</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Nueva Reserva</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Consultar Reserva</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Calendario</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Ver Pagos</span>
                        </a>
                    </li>

                @endif

                @if (Auth::user()->rol_id == 2)

                    <li class="menu-title"><span>Consultor</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Calendario</span>
                        </a>
                    </li>

                @endif

                @if (Auth::user()->rol_id == 1)

                    <li class="menu-title"><span>Administrador</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Nueva Reserva</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Consultar Reserva</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Ver Pagos</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('usuarios.index') }}">
                            <i class="ri-dashboard-2-line"></i> <span>Mantenimiento de Usuarios</span>
                        </a>
                    </li>

                @endif
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>

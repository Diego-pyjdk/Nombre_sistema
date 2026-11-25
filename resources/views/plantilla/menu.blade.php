<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="../index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Sistema</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Menú
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ciudad.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ciudades</p>     
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nacionalidad.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Nacionalidades</p>
                            </a>
                        </li>
                        @foreach (['becas' => 'Becas', 'ivas' => 'IVA', 'cursos' => 'Cursos', 'horarios' => 'Horarios', 'alumnos' => 'Alumnos'] as $recurso => $etiqueta)
                            <li class="nav-item">
                                <a href="{{ route($recurso.'.index') }}" @class(['nav-link', 'active' => request()->routeIs($recurso.'.*')])>
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>{{ $etiqueta }}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="../index3.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Submenú 3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../generate/theme.html" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Theme Generate



                        
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="mnuSeguridad">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Seguridad
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="itemUsuario">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Submenú 1</p>
                            </a>
                            <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="itemUsuario">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Submenú 2</p>
                            </a>
                        </li>
                        </li>
                    </ul>
                </li>               
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>

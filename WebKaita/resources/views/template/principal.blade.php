<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaita - Salud y Belleza Natural | @yield('title')</title>
    <link rel="icon" href="images/kaitita.png">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <!-- cdn de font icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>
<body class="bg-light">

    <!-- sidebar -->      
    <div class="offcanvas offcanvas-start sidebar-nav border-0 shadow" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasExampleLabel">
        <div class="p-2 " style="background-color: rgb(60, 190, 48);">
            <div class="col-12 text-center">
                <img src="/images/kaita.png" style="width: 70px;" alt="">
            </div>
        </div>
        <div class="offcanvas-body p-0">
            <nav class="navbar-white">
                <ul class="navbar-nav">
                    <li>
                        <div class="user-info">
                            <div class="text-center">
                                <img src="images/user.png" class="rounded-circle me-2" style="width: 60px;" alt=""/>
                            </div>
                            <div class="info-container text-white">
                                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                                <div class="email">john.doe@example.com</div>
                            </div>
                        </div>
                    </li>
                    <li class="header">Menu Principal</li>
                    <li class="mx-2 my-1">
                        <a href="/index" class="nav-link px-3 active menu">
                            <span>
                                <i class="bi bi-pie-chart-fill me-2"></i>
                            </span>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu" role="button" aria-expanded="false" aria-controls="collapsemenu">
                            <span>
                                <i class="bi bi-people-fill me-2"></i>
                            </span>
                            <span>
                                Bloggers
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nuevo Blogger
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Bloggers
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu2" role="button" aria-expanded="false" aria-controls="collapsemenu2">
                            <span>
                                <i class="bi bi-file-earmark-richtext-fill me-2"></i>
                            </span>
                            <span>
                                Artículos
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu2">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nuevo Artículo
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Artículos
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu3" role="button" aria-expanded="false" aria-controls="collapsemenu2">
                            <span>
                                <i class="bi bi-grid-fill me-2"></i>
                            </span>
                            <span>
                                Categorías
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu3">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="{{url('categorias/create')}}" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nueva Categoría
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Categorías
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu4" role="button" aria-expanded="false" aria-controls="collapsemenu2">
                            <span>
                                <i class="bi bi-tag-fill me-2"></i>
                            </span>
                            <span>
                                Etiquetas
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu4">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="{{url('categorias/create')}}" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nueva Categoría
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Etiquetas
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu5" role="button" aria-expanded="false" aria-controls="collapsemenu3">
                            <span>
                                <i class="bi bi-boxes me-2"></i>
                            </span>
                            <span>
                                Proyectos
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu5">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="{{url('proyectos/create')}}" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nuevo Proyecto
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Proyectos
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu6" role="button" aria-expanded="false" aria-controls="collapsemenu3">
                            <span>
                                <i class="bi bi-diagram-3-fill me-2"></i>
                            </span>
                            <span>
                                Servicios
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu6">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="{{url('servicios/create')}}" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nuevo Servicio
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Servicios
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link menu" data-bs-toggle="collapse" href="#collapsemenu7" role="button" aria-expanded="false" aria-controls="collapsemenu4">
                            <span>
                                <i class="bi bi-person-badge-fill me-2"></i>
                            </span>
                            <span>
                                Equipo
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu7">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    {{-- <li>
                                        <a href="/personal_index" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Nuevo Miembro
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Ver Miembros
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="header">Mas Opciones</li>
                    <li class="mx-2">
                        <a href="" class="nav-link px-3 menu d-inline-flex">
                            <span class="material-icons text-secondary mt-1 me-2">donut_large</span>
                            <span class="my-1">
                                Configuración
                            </span>
                        </a>
                    </li>

                    <li class="mx-2">
                        <a href="" class="nav-link px-3 menu d-inline-flex">
                            <span class="material-icons text-danger mt-1 me-2">donut_large</span>
                            <span class="my-1">
                                Acerca de
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a href="#" class="nav-link px-3 menu d-inline-flex">
                            <span class="material-icons text-info mt-1 me-2">donut_large</span>
                            <span class="my-1">
                                Ayuda
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- fin sidebar -->
    
    <!-- contenido -->
    <main>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg shadow-sm fixed-top mb-5">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="ms-auto d-flex">
                    <div class="nav-item dropdown me-2">
                        <!-- <a class=" btn btn-warning nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                        </span>
                        </a> -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href=""><i class="bi bi-person-badge me-2"></i> Mi Perfil</a></li>
                        <li><a class="dropdown-item" href=""><i class="bi bi-file-text-fill me-2"></i> Nuevo Articulo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout"><i class="bi bi-door-open-fill me-2"></i> Cerrar Sesion</a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <!-- fin navbar -->

        <!-- principal -->
            <div class="container-fluid py-5">
               @yield('content')
            </div>
        <!-- fin principal -->

        <!-- footer  -->
        <footer class="footer pb-0 fixed-bottom shadow-lg mt-5 pt-3 border-top">
            <div class="container-fluid">
                <div class="text-center text-lg-end ">
                    <p>Copyright © 2021 <a href="#" style="text-decoration: none;" class="text-secondary fw-bold">CUANTICA Group</a> - Todos los derechos Reservados</p>
                </div>
            </div>
        </footer>
        <!-- fin footer -->
    </main>
    <!-- fin contenido -->
        
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    @yield('js')
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaita | <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="/images/icon-kaita.png">
    <link rel="stylesheet" href="/css/kaitaStyle.css">
    <link rel="stylesheet" href="/css/templategeneral.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"> 
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="bg-light">

    <!-- sidebar -->      
    <div class="offcanvas offcanvas-start  sidebar-nav border-0 shadow" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasExampleLabel">
        <div class="border-bottom py-2">
                <div class="text-center">
                    <img src="/images/logo-kaita.png" width="auto" height="50"  alt="">
                </div>
        </div>
        <div class="offcanvas-body p-0">
            <nav class="navbar-white">
                <ul class="navbar-nav">
                    <li>
                        <div class="mx-2 my-2 text-center">
                            <img src="/images/avatar.png" class="rounded-circle me-2 shadow-sm" style="width: 60px;" alt="">
                        </div>
                        <div class="text-center">
                            <span class="fw-light">
                                Gilberto Alexander De La Cruz Saravia
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase text-center px-3 pt-1">
                            Administrador
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('/')); ?>" class="nav-link px-3 text-dark <?php echo e(request()->is('/')? 'active' : null); ?> menu">
                            <span>
                                <i class="bi bi-pie-chart-fill me-2"></i>
                            </span>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link <?php echo e(request()->is('configuracion-de-almacen', 'almacen', 'areas', 'categorias', 'productos', 'inventario', 'movimientos')? 'active' : null); ?> menu text-dark" data-bs-toggle="collapse" href="#collapsemenu" role="button" aria-expanded="false" aria-controls="collapsemenu">
                            <span>
                                <i class="bi bi-box-seam me-2"></i>
                            </span>
                            <span>
                                Almacén
                            </span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapsemenu">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="<?php echo e(url('configuracion-de-almacen')); ?>" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Configuración
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('productos')); ?>" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Productos
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('inventario')); ?>" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Inventario
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('movimientos')); ?>" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Movimientos
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('acerca-de')); ?>" class="nav-link px-3 <?php echo e(request()->is('acerca-de')? 'active' : null); ?> menu">
                            <span>
                                <i class="bi bi-circle text-info me-2"></i>
                            </span>
                            <span>
                                Acerca de
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('ayuda')); ?>" class="nav-link px-3 <?php echo e(request()->is('ayuda')? 'active' : null); ?> menu">
                            <span>
                                <i class="bi bi-circle text-danger me-2"></i>
                            </span>
                            <span>
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
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-sm fixed-top mb-5">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="ms-auto d-flex">
                    <div class="nav-item dropdown me-2">
                        <a class=" btn btn-secondary nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                        </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Gilberto Alexander
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <!-- fin navbar -->

        <!-- principal -->
            <div class="container-fluid py-5">
               <?php echo $__env->yieldContent('content'); ?>
            </div>
        <!-- fin principal -->

        <!-- footer  -->
        <footer class="footer pb-0 fixed-bottom bg-white shadow-lg mt-5 pt-3 border-top">
            <div class="container-fluid">
                <div class="clearfix pb-2">
                    <small class="text-muted text-uppercase">Desarrado Por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-cuantica" target="bank">Cuantica <span class="text-group text-capitalize">Group</span></a></small>
                    <span class="float-end">Copyright © 2022 <a href="https://kaita.com/" class="text-decoration-none text-primary fw-bold" target="bank">Kaita</a> - Todos los derechos Reservados - <small class="text-muted">version 1.0</small></span>
                    
                </div>
            </div>
        </footer>
        <!-- fin footer -->
    </main>
    <!-- fin contenido -->
        
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <?php echo $__env->yieldContent('js'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/templates/templateDashboard.blade.php ENDPATH**/ ?>
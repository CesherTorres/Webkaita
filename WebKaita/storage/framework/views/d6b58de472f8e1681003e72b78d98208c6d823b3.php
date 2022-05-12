<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaita | <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="/images/KAITA 3.png">
    <link rel="stylesheet" href="/css/kaitaStyle.css">
    <link rel="stylesheet" href="/css/templategeneral.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/select.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/datatables/responsive.bootstrap.min.css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="bg-light">

    <!-- sidebar -->      
    <div class="offcanvas offcanvas-start  sidebar-nav border-0 shadow" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-white">
                <ul class="navbar-nav">
                    <li>
                        <div class="user-info border-0 mb-3">
                            <div class="text-center">
                                <img src="/images/logo-kaita2-white.png" class=" mx-auto" style="width: 100px"; height="70px"  alt="">
                            </div>
                            <div class=" py-2 text-center">
                                <img src="/images/<?php echo e(Auth()->user()->persona->avatar); ?>" class="rounded-circle border text-center mx-auto border-2 border-white shadow" style="width: 60px;" alt="">
                            </div>
                            <div class="text-center">
                                <span class="fw-light d-inline-block text-white text-truncate">
                                    <?php echo e(Auth()->user()->persona->name); ?>

                                </span>
                            </div>
                            <div class="text-white small fw-bold text-uppercase text-center px-3">
                                <?php echo e(Auth()->user()->tipousuario->name.' - '.Auth()->user()->tipousuario->nivel); ?>

                            </div>
                        </div>
                    </li>
                    
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('/dashboard')); ?>" class="nav-link px-3 text-dark <?php echo e(request()->is('dashboard', 'adminlte')? 'active-item' : null); ?> menu">
                            <span>
                                <i class="bi bi-pie-chart-fill me-2"></i>
                            </span>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a class="nav-link px-3 sidebar-link <?php echo e(request()->is('configuracion-de-almacen', ['almacen*'], 'areas', 'categorias', ['productos*'], ['inventario*'], ['ingresos*'], ['salidas*'], 'medidas', 'etiquetas', 'marcas')? 'active-item' : null); ?> menu text-dark" data-bs-toggle="collapse" href="#collapsemenu" role="button" aria-expanded="false" aria-controls="collapsemenu">
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
                                        <a href="<?php echo e(url('configuracion-de-almacen')); ?>" class="nav-link mt-2 px-3 menu">
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
                                        <a href="<?php echo e(url('ingresos')); ?>" class="nav-link px-3 menu">
                                            <span>
                                                <i class="bi bi-circle me-2"></i>
                                            </span>
                                            <span>
                                                Movimientos
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
                                    
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('acerca-de')); ?>" class="nav-link px-3 <?php echo e(request()->is('acerca-de')? 'active-item' : null); ?> menu">
                            <span>
                                <i class="bi bi-circle text-info me-2"></i>
                            </span>
                            <span>
                                Acerca de
                            </span>
                        </a>
                    </li>
                    <li class="mx-2 my-1">
                        <a href="<?php echo e(url('ayuda')); ?>" class="nav-link px-3 <?php echo e(request()->is('ayuda')? 'active-item' : null); ?> menu">
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
                    
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>  <?php echo e(Auth()->user()->persona->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-4 borde-bottom-primary shadow" aria-labelledby="navbarDropdown">
                            <li class="border-bottom pb-3">
                                <div class=" py-2 mx-3 text-center">
                                    <img src="/images/<?php echo e(Auth()->user()->persona->avatar); ?>" class="rounded-circle border text-center mx-auto border-2 border-white shadow-sm" style="width: 80px;" alt="">
                                </div>
                                <span class="text-muted px-5"><?php echo e(Auth()->user()->email); ?></span>
                            </li>
                           
                            <li class="border-bottom">
                                <a class="dropdown-item py-2 my-2 menu" href="#">
                                    <i class="bi bi-person-badge me-2"></i>
                                    Mi Perfil
                                </a>
                            </li>
                          
                            <li class="border-bottom">
                                <a class="dropdown-item py-2 my-2 menu" href="#">
                                    <i class="bi bi-gear-fill me-2"></i>
                                    Configuración
                                </a>
                            </li>
                           
                            <li >
                                <a class="dropdown-item py-2 mt-2 menu" href="/logout">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <!-- fin navbar -->

        <!-- principal -->
            <div class="container-fluid mb-5 py-5">
               <?php echo $__env->yieldContent('content'); ?>
            </div>
        <!-- fin principal -->

        <!-- footer  -->
        <footer class="footer pb-0 fixed-bottom bg-white shadow-lg mt-5 pt-3 border-top">
            <div class="container-fluid">
                <div class="row pb-2">
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <small class="text-muted text-uppercase">Desarrado Por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-cuantica" target="bank">Cuantica <span class="text-group text-capitalize">Group</span></a></small>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <span class="float-end">Copyright © <?php echo date("Y");?>  <a href="https://kaita.com/" class="text-decoration-none text-primary fw-bold" target="bank">Kaita</a> - Todos los derechos Reservados - <small class="text-muted">version 1.0</small></span>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- fin footer -->
    </main>
    <!-- fin contenido -->
        
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/chart.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/js/datatables/dataTables.responsive.min.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

    <script>
        $(document).ready(function() {
            $('table.display').DataTable( {
                responsive: true,
                fixedHeader: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "next": "&raquo;",
                        "previous": "&laquo;"
                    } 
                }
            } );
        new $.fn.dataTable.FixedHeader( table );
        } );
    </script>

    <?php echo $__env->yieldContent('js'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/templates/templateDashboard.blade.php ENDPATH**/ ?>
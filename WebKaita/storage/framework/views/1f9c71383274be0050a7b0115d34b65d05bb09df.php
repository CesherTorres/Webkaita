

<?php $__env->startSection('title', 'Configuración'); ?>

<?php $__env->startSection('content'); ?>
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Configuración</h1>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-lg-3 d-flex">
                    
                </div>
            </div>
        <!-- fin encabezado -->

        
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuración</li>
                </ol>
            </div>
        

            <!-- card-info -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-top-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 mb-0 fw-bold text-dark">Almacenes</div>
                                    <a href="<?php echo e(url('almacen')); ?>" class="stretched-link"></a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-box2 h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-top-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 mb-0 fw-bold text-dark">Áreas</div>
                                    <a href="<?php echo e(url('areas')); ?>" class="stretched-link"></a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-boxes h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-top-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 mb-0 fw-bold text-dark">Categorías</div>
                                    <a href="<?php echo e(url('categorias')); ?>" class="stretched-link"></a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-tag-fill h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    
                </div>
            </div>
            <!-- fin card-info -->

    <!--Fin principal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/configuracion-de-almacen/index.blade.php ENDPATH**/ ?>
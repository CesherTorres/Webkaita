

<?php $__env->startSection('title', 'Inventario'); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row justify-content-between pt-5">
            <div class="col-lg-7">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Inventario</h1>
                <p class="text-muted">Se muestra la lista de inventarios por almacén.</p>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-lg-5">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item" aria-current="page">Inventario</li>
                </ol>
            </div>
        </div>

        <div class="col-12 mb-2 col-lg-4">
           
        </div>
    </div>
    

    
    <div class="row">
        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-4 mb-4">
            <div class="card border-4 h-100  borde-top-primary shadow my-2">
                <div class="card-body pt-1 pb-0">
                    <div class="row align-items-center">
                        <div class="col-6 mr-2">
                            <div class="h6 mb-0 fw-bold text-primary text-uppercase"><?php echo e($store->name); ?></div>
                            <div class="h6 fw-light text-muted"><?php echo e($store->direccion); ?></div>
                            <a href="<?php echo e(route('ingresos.store', $store->slug)); ?>" class="stretched-link"></a>
                        </div>
                        <div class="col-6">
                            <div class="h3 mb-0 fw-bold text-primary text-end text-uppercase"><?php echo e($store->total); ?></div>
                            <small class="text-muted float-end">productos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
        
       
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/inventario/index.blade.php ENDPATH**/ ?>
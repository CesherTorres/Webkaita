

<?php $__env->startSection('title', 'Movimiento de ingreso'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="text-muted">Visualizar detalles del movimiento de ingreso.</p>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Movimientos</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('ingresos')); ?>">Ingresos</a></li>
                    <li class="breadcrumb-item" aria-current="page"><?php echo e($ingreso->codigo); ?></li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
    

    
    <div class="card border-4 borde-left-primary shadow-sm mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group my-2 my-md-0">
                        <label>Ingreso a</label>
                        <p class="fw-light"><?php echo e($ingreso->store->name); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group my-2 my-md-0">
                        <label>Tipo de producto</label>
                        <p class="fw-light"><?php echo e($ingreso->tipo->name); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group my-2 my-md-0">
                        <label>Motivo de movimiento</label>
                        <p class="fw-light"><?php echo e($ingreso->motivo->name); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group my-2 my-md-0">
                        <label>Fecha de movimiento</label>
                        <p class="fw-light"><?php echo e($ingreso->fecha); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-4 borde-top-primary shadow-sm pt-2 mb-4" id="">
        <div class="card-body" id="">
            <div class="table-responsive mt-3">
                <table class="table" id="detalles">
                    <thead>
                      <tr>
                        <th class="fw-bold" >Código Prod.</th>
                        <th class="fw-bold">Producto</th>
                        <th class="fw-bold">Lote</th>
                        <th class="fw-bold">Orden de Fab.</th>
                        <th class="fw-bold">Fec. Vencimiento</th>
                        <th class="fw-bold">Área Destino</th>
                        <th class="fw-bold">Observaciones</th>
                        <th class="fw-bold">Cantidad</th>
                        <th class="fw-bold"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $detalleingreso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-light align-middle"><?php echo e($i->codigo); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->name); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->lote); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->orden_fabricacion); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->fecha_vencimiento); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->area_destino); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->observaciones); ?></td>
                                <td class="fw-light align-middle"><?php echo e($i->cantidad); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="py-2 col-12 col-md-4">
                    <label for="">Guía de remisión</label>
                    <p class="fw-light"><?php echo e($ingreso->nguia); ?></p>
                </div>
                <div class="py-2 col-12 col-md-8 text-end">
                    <label for="">Cantidad total de productos</label>
                    <p class="fw-bold text-primary fs-3" id="tproductos"><?php echo e($ingreso->total_product); ?></p>
                </div>
            </div>
            <p>Responsable de movimiento: <?php echo e($ingreso->almacenero->user->persona->name); ?></p>
        </div>
    </div>    
    
    <div class="text-end py-3">
        <a href="<?php echo e(url('ingresos')); ?>" class="btn btn-secondary px-5 text-white">Volver</a>  
    </div>
       
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/neptundata.com/resources/views/movimientos/ingresos/show.blade.php ENDPATH**/ ?>
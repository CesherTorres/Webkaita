

<?php $__env->startSection('title', 'Movimiento de salida'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="text-muted">Visualizar detalles del movimiento de salida.</p>
            </div>
            <div class="col-lg-3">
               
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Movimientos</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('salidas')); ?>">Salidas</a></li>
                    <li class="breadcrumb-item" aria-current="page"><?php echo e($salida->codigo); ?></li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="clearfix">
                        <span class="fw-bold">Sr.(es):</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->cliente->user->persona->name); ?></span>
                    </div>
                    <div class="clearfix py-2">
                        <span class="fw-bold">Dirección:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->cliente->user->persona->direccion); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold">Identificación:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->cliente->user->persona->identificacion.' - '.$salida->cliente->user->persona->nro_identificacion); ?></span>
                    </div>
                    <div class="clearfix py-2">
                        <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->tipo_comprobante.' - '.$salida->nro_comprobante); ?></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="clearfix">
                        <span class="fw-bold ">Punto de partida:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->store->name); ?></span>
                    </div>
                    <div class="clearfix py-2">
                        <span class="fw-bold ">Punto de llegada:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->destino_store); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold ">Fecha de emision:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->fecha); ?></span>
                    </div>
                    <div class="clearfix py-2">
                        <span class="fw-bold ">Motivo: </span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->motivo->name); ?></span>
                    </div>
                </div>
            </div>
                
            <span class="text-uppercase border-top border-primary fw-bold d-block pt-2" style="font-size: 12px">datos del transportista</span>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="clearfix">
                        <span class="fw-bold">Nombre:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->user->persona->name); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold ">Identificación:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->user->persona->identificacion); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold ">Brevete:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->brevete); ?></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="clearfix">
                        <span class="fw-bold ">Domicilio:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->user->persona->direccion); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold ">Nro. Identificación:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->user->persona->nro_identificacion); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold ">Placa:</span>
                        <span class="fw-normal text-blue float-end"><?php echo e($salida->chofer->placa); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fw-bold">CÓDIGO</th>
                            <th class="fw-bold">DESCRIPCIÓN</th>
                            <th class="fw-bold">ORDEN FAB.</th>
                            <th class="fw-bold">CANTIDAD</th>
                            <th class="fw-bold">UNIDAD MEDIDA</th>
                            <th class="fw-bold">PESO TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $detallesalida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                                <td class=" align-middle fw-light"><?php echo e($item->codigo); ?></td>
                                <td class=" align-middle fw-light"><?php echo e($item->name); ?></td>
                                <td class=" align-middle fw-light"><?php echo e($item->orden_fabricacion); ?></td>
                                <td class=" align-middle fw-light"><?php echo e($item->cantidad); ?></td>
                                <td class=" align-middle fw-light"><?php echo e($item->medida); ?></td>
                                <td class=" align-middle fw-light"><?php echo e($item->peso_total); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="pb-2 col-12 col-md-4">
                    <label for="" class="py-0">Guía de remisión</label>
                    <span class="text-uppercase d-block fw-bold"><?php echo e($salida->nro_serie_guia); ?> - <span class="text-red fw-bold lead">N° <?php echo e($salida->nguia); ?></span></span>
                </div>
                <div class="pb-2 col-12 col-md-8 text-end">
                    <label for="">Cantidad total de productos</label>
                    <span class="fw-bold text-primary d-block fs-3" id="tproductos"><?php echo e($salida->total_product); ?></span>
                </div>
            </div>
            <p>Responsable de movimiento: <?php echo e($salida->almacenero->user->persona->name); ?></p>
        </div>
    </div>
    
    <div class="text-end pb-3">
        <a href="<?php echo e(url('salidas')); ?>" class="btn btn-secondary px-5 text-white">Volver</a>  
    </div>
       
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/neptundata.com/resources/views/movimientos/salidas/show.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Movimiento de salida'); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="text-muted">Se muestra la lista de registros de movimientos de salida.</p>
            </div>
            <div class="col-lg-3">
                <div class="btn-group btn-group-sm w-100 mb-2 mb-md-0" role="group" aria-label="Basic radio toggle button group">
                   <a href="<?php echo e(url('ingresos')); ?>" class="btn btn-outline-success">Ingresos</a>
                    <a href="<?php echo e(url('salidas')); ?>" class="btn btn-success text-white">Salidas</a>
                </div>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Movimientos</a></li>
                    <li class="breadcrumb-item" aria-current="page">Salidas</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="text-start text-md-end pb-3">
                <div class="btn-group me-2" role="group" aria-label="Basic example">
                    <a href="<?php echo e(url('salidas/export/reporte-excel')); ?>" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-excel me-2"></i>CSV</a>
                    <a href="<?php echo e(route('print-salidas.pdf')); ?>" target="bank" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</a>
                </div>
                <small>
                    <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
                </small>
            </div>
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm py-2  mb-5" id="">
        <div class="card-body" id="">        
            <div class="row pb-2">
                <div class="col-12 col-md-9">
                    <h6 class="text-uppercase fw-bold">Lista de movimiento de salida</h6>
                </div>
                <div class="col-12 col-md-3">
                    <a href="<?php echo e(url('salidas/create')); ?>" class="btn btn-primary btn-sm w-100 align-self-center text-white">
                        <i class="bi bi-plus-circle-fill me-2"></i>
                        Nuevo movimiento salida
                    </a>
                </div>
            </div>
            <div class="">
                <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">N° movimiento</th>
                            <th class="h6">Tipo de producto</th>
                            <th class="h6">Motivo de movimiento</th>
                            <th class="h6">Cantidad de productos</th>
                            <th class="h6">Guía de remisión</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                            
                    <tbody>
                        <?php $__currentLoopData = $salidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-light align-middle"><?php echo e($salida->codigo); ?></td>
                            <td class="fw-light align-middle"><?php echo e($salida->tipo->name); ?></td>
                            <td class="fw-light align-middle"><?php echo e($salida->motivo->name); ?></td> 
                            <td class="fw-light align-middle"><?php echo e($salida->total_product); ?></td>        
                            <td class="fw-light align-middle"><?php echo e($salida->nro_serie_guia.' - '.$salida->nguia); ?></td>        
                            <td class="align-middle">                                        
                                <div class="text-center">
                                    <div class="d-flex">
                                        <a href="<?php echo e(url("salidas/$salida->slug")); ?>" class="btn btn-secondary text-white btn-sm text-decoration-none me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalles"><i class="bi bi-eye-fill"></i></a>
                                        <button type="button" class="btn btn-secondary text-white btn-sm me-1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimir">
                                            <i class="bi bi-printer-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('movimiento_salida.pdf', $salida)); ?>" target="bank"><i class="bi bi-file-pdf-fill me-2"></i>Imprimir movimiento</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('guia_salida.pdf', $salida)); ?>" target="bank"><i class="bi bi-file-earmark-ruled-fill me-2"></i>Imprimir guía</a></li>
                                        </ul>
                                    </div>
                                </div>      
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody> 
                </table> 
            </div>           
        </div>
    </div>
        
       
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!--sweet alert agregar-->
    <?php if(session('addproducto') == 'ok'): ?>
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Éxito!',
            text: 'Nombre de producto registrado correctamente',
            })
        </script>
    <?php endif; ?>

    <!--sweet alert actualizar-->
    <?php if(session('update') == 'ok'): ?>
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Actualizado!',
            text: 'Registro actualizado correctamente',
            })
        </script>
    <?php endif; ?>
        
    <!--sweet alert eliminar-->
    <?php if(session('delete') == 'ok'): ?>
        <script>
        Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    <?php endif; ?>
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#07A683',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
    <!--.sweet alert eliminar-->
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/movimientos/salidas/index.blade.php ENDPATH**/ ?>
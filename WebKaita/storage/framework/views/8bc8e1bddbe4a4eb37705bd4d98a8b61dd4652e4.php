

<?php $__env->startSection('title', 'Almacenes'); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Almacenes</h1>
                <p class="text-muted">Se muestra la lista de registros de almacén.</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href="<?php echo e(url('almacen/create')); ?>" class="btn btn-primary w-100 align-self-center mb-2 mb-md-0 text-white">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Nuevo almacén
                </a>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('configuracion-de-almacen')); ?>">Configuración de almacén</a></li>
                    <li class="breadcrumb-item" aria-current="page">Almacenes</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="text-start text-md-end pb-3">
                <div class="btn-group me-2" role="group" aria-label="Basic example">
                    <a href="<?php echo e(url('almacen/export/reporte-excel')); ?>" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-excel me-2"></i>CSV</a>
                    <a href="<?php echo e(route('print-almacenes.pdf')); ?>" target="bank" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</a>
                </div>
                <small>
                    <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
                </small>
            </div>
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
        <div class="card-body">
            <h6 class="text-uppercase fw-bold text-center">Lista de almacenes</h6>
            <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                <thead class="bg-light">
                    <tr>
                        <th class="h6">N°</th>
                        <th class="h6">Almacén</th>
                        <th class="h6">Dirección</th>
                        <th class="h6">Departamento/Provincia/Distrito</th>
                        <th class="h6 text-center">Acciones</th>
                    </tr>
                </thead>
                        <tbody>
                            <?php $__currentLoopData = $almacenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almacen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-light align-middle"><?php echo e($almacen->id); ?></td>
                                    <td class="fw-light align-middle"><?php echo e($almacen->name); ?></td>
                                    <td class="fw-light align-middle"><?php echo e($almacen->direccion); ?></td>
                                    <td class="fw-light align-middle"><?php echo e($almacen->ubigeo->departamento.'/'.$almacen->ubigeo->provincia.'/'.$almacen->ubigeo->distrito); ?></td>
                                    <td class="align-middle">                                        
                                        <div class="text-center">
                                            <form method="POST" action="<?php echo e(route('almacen.destroy',$almacen->slug)); ?>" class="form-delete">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a href="<?php echo e(url("almacen/$almacen->slug")); ?>" class="btn btn-secondary text-white btn-sm text-decoration-none"><i class="bi bi-eye-fill"></i></a>
                                                <a href="<?php echo e(url("almacen/$almacen->slug/edit")); ?>" type="button" class="btn btn-secondary text-white btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <button type="submit" class="btn btn-secondary text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                            </form>
                                        </div>      
                                    </td> 
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
            </table>
        </div>
    </div>
    <br>
       
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!--sweet alert agregar-->
    <?php if(session('addalmacen') == 'ok'): ?>
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Éxito!',
            text: 'Almacén registrado correctamente',
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

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/configuracion-de-almacen/almacenes/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Marcas'); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Categorías</h1>
                <p class="text-muted">Se muestra la lista de registros de categorías.</p>
            </div>
            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center text-white mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#createcategorias">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Nueva categoría
                </button>
            </div>
        </div>
        
    <!-- fin encabezado -->

    
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('configuracion-de-almacen')); ?>">Configuración de almacén</a></li>
                    <li class="breadcrumb-item" aria-current="page">Categorías</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="text-start text-md-end pb-3">
                <div class="btn-group me-2" role="group" aria-label="Basic example">
                    <a href="<?php echo e(url('categorias/export/reporte-excel')); ?>" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-excel me-2"></i>CSV</a>
                    <a href="<?php echo e(route('print-categories.pdf')); ?>" target="bank" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</a>
                </div>
                <small>
                    <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
                </small>
            </div>
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
        <div class="card-body">
            <h6 class="text-uppercase fw-bold text-center">Lista de categorías</h6>
            <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                <thead class="bg-light">
                    <tr>
                        <th class="h6">N°</th>
                        <th class="h6">Categoría</th>
                        <th class="h6">Descripción</th>
                        <th class="h6 text-center">Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-light align-middle"><?php echo e($categoria->id); ?></td>
                                <td class="fw-light align-middle"><?php echo e($categoria->name); ?></td>
                                <td class="fw-light align-middle"><?php echo e($categoria->descripcion); ?></td>
                                <td class="align-middle">                                        
                                    <div class="text-center">
                                        <form method="POST" action="<?php echo e(route('categorias.destroy',$categoria->slug)); ?>" class="form-delete">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" class="btn btn-secondary text-white btn-sm " data-bs-toggle="modal" data-bs-target="#editcategorias<?php echo e($categoria->slug); ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button type="submit" class="btn btn-secondary text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                        </form>
                                    </div>    
                                </td>
                            </tr>
                            <?php echo $__env->make('configuracion-de-almacen.categorias.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
            </table>
        </div>
    </div>
    <br>
         
   
    <?php echo $__env->make('configuracion-de-almacen.categorias.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!--sweet alert agregar-->
    <?php if(session('addcategoria') == 'ok'): ?>
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#07A683',
        title: '¡Éxito!',
        text: 'Categoría registrado correctamente',
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

    <script>
    $(document).ready(function(){
    <?php if($message = Session::get('errors')): ?>
        $("#createcategorias").modal('show');
    <?php endif; ?>
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/configuracion-de-almacen/categorias/index.blade.php ENDPATH**/ ?>
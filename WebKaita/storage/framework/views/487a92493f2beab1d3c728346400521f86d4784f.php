

<?php $__env->startSection('title', 'Almacenes'); ?>

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Almacenes</h1>
                <p class="text-muted">Crea un nuevo almacén</p>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('configuracion-de-almacen')); ?>">Configuración de almacén</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('almacen')); ?>">Almacenes</a></li>
                    <li class="breadcrumb-item" aria-current="page">Nuevo almacén</li>
                </ol>
            </div>
        </div>
    </div>
    

     
    <form class="form-group" method="POST" action="/almacen" enctype="multipart/form-data" autocomplete="off">      
        <?php echo csrf_field(); ?>
        <div class="card border-4 borde-top-primary shadow-sm mt-2 m2-5">
            <div class="card-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <input type="date" hidden name="fecha" value="<?php echo e($now->format('Y-m-d')); ?>">
                <div class="row">
                    <div class="col-12 col-md-6 py-1">
                        <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="<?php echo e(old('name')); ?>" maxLength="100">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12 col-md-6 py-1">
                        <label for="direccion_id" class="form-label">Dirección<span class="text-danger">*</span></label>
                        <input type="text" name="direccion" id="direccion_id" class="form-control fw-light form-control-sm" value="<?php echo e(old('direccion')); ?>"  maxLength="100">
                        <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12 col-md-6 py-1">
                        <label for="referencia_id" class="form-label">Referencia<span class="text-danger">*</span></label>
                        <input type="text" name="referencia" id="referencia_id" class="form-control fw-light form-control-sm" value="<?php echo e(old('referencia')); ?>"  maxLength="100">
                        <?php $__errorArgs = ['referencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12 col-md-6 py-1">
                        <label for="ubigeo_id" class="form-label">Distrito/Provincia/Departamento<span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm select2" name="ubigeo_id" id="ubigeo_id">
                            <option value="<?php echo e(old('ubigeo_id')); ?>" disabled="disabled" selected="selected" hidden="hidden"></option>
                            <?php $__currentLoopData = $ubigeos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubigeo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($ubigeo->id); ?>"><?php echo e($ubigeo->distrito.'/'.$ubigeo->provincia.'/'.$ubigeo->departamento); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </select>
                        <?php $__errorArgs = ['ubigeo_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12 col-md-10 py-1">
                        <label for="descripcion_id" class="form-label">Descripción</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 160px"><?php echo e(old('descripcion')); ?></textarea>
                            <label for="floatingTextarea2">Escribe una descripción</label>
                        </div>
                    </div>

                    <div class="col-9 col-md-2 py-1">
                        <label for="" class="form-label">Plano<span class="text-danger">*</span></label>
                        <div class="card text-center imagecard rounded bg-light mb-0" style="height: 160px">  
                            <label for="uploadImage1" class=" my-auto text-center">
                                <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 100%; height: 156px;" src="/images/icon-photo.png">   
                            </label>
                        </div>
                        <input id="uploadImage1" class="form-control-file" type="file" name="plano" onchange="previewImage(1);" hidden/>
                        <?php $__errorArgs = ['plano'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end py-3">
            <button type="submit" class="btn btn-primary px-5 text-white">Registrar almacen</button> 
            <a href="<?php echo e(url('almacen')); ?>" class="btn btn-outline-secondary">Cancelar</a>  
        </div>
    </form>
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function previewImage(nb) {        
      var reader = new FileReader();         
      reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
      reader.onload = function (e) {             
          document.getElementById('uploadPreview'+nb).src = e.target.result;         
      };     
    }

</script>
<script>
    // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        $('.select2').select2();
    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/configuracion-de-almacen/almacenes/create.blade.php ENDPATH**/ ?>
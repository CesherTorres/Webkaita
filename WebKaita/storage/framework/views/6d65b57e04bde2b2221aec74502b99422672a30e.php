<div class="modal fade" id="createcategorias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Nueva categoría</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted text-start">(*) - Campos obligatorios</p>
                <form class="form-group" method="POST" action="">      
                    <?php echo csrf_field(); ?>
                        <div class="py-1">
                            <label for="name_id" class="form-label">Nombre(*)</label>
                            <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="<?php echo e(old('name')); ?>"  maxLength="100">
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

                        <div class="py-1">
                            <label for="tipo_id" class="form-label">Tipo(*)</label>
                            <select class="form-select form-select-sm" name="tipo" id="tipo_id">
                                <option value="<?php echo e(old('tipo')); ?>" disabled="disabled" selected="selected" hidden="hidden"><?php echo e(old('tipo')); ?></option>
                                <option value="Materia prima">Materia prima</option>
                                <option value="Productos">Productos</option>
                                <option value="Activos">Activos</option>
                            </select>
                            <?php $__errorArgs = ['tipo'];
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

                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="floatingTextarea2" style="height: 140px"><?php echo e(old('descripcion')); ?></textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                                <?php $__errorArgs = ['descripcion'];
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
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Registrar categoría</button>   
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/configuracion-de-almacen/categorias/create.blade.php ENDPATH**/ ?>
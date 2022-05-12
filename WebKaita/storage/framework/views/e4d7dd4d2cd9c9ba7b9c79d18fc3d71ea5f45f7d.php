<div class="modal fade" id="editalmacen<?php echo e($almacen->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar Almacén</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted text-start">(*) - Campos obligatorios</p>
                <form class="form-group" method="POST" action="/almacen/<?php echo e($almacen->id); ?>" enctype="multipart/form-data">      
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <input type="date" hidden name="fecha" value="<?php echo e($now->format('Y-m-d')); ?>">
                    <div class="row">
                        <div class="col-12 col-md-6 py-1">
                            <label for="name_id" class="form-label">Nombre(*)</label>
                            <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="<?php echo e($almacen->name); ?>" maxLength="100">
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
                            <label for="tipo_id" class="form-label">Tipo(*)</label>
                            <select class="form-select form-select-sm" name="tipo" id="tipo_id">
                                <option value="<?php echo e($almacen->tipo); ?>" disabled="disabled" selected="selected" hidden="hidden"><?php echo e($almacen->tipo); ?></option>
                                <option value="Materia prima">Materia prima</option>
                                <option value="Productos">Productos</option>
                                </select>
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

                        <div class="col-12 col-md-6 py-1">
                            <label for="direccion_id" class="form-label">Dirección(*)</label>
                            <input type="text" name="direccion" id="direccion_id" class="form-control fw-light form-control-sm" value="<?php echo e($almacen->direccion); ?>"  maxLength="100">
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
                            <label for="referencia_id" class="form-label">Referencia(*)</label>
                            <input type="text" name="referencia" id="referencia_id" class="form-control fw-light form-control-sm" value="<?php echo e($almacen->referencia); ?>"  maxLength="100">
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

                        <div class="col-12 py-1">
                            <label for="ubigeo_id" class="form-label">Distrito/Provincia/Departamento(*)</label>
                            <select class="form-select form-select-sm" name="ubigeo_id" id="ubigeo_id" value="<?php echo e(old('ubigeo_id')); ?>">
                                <option value="<?php echo e($almacen->ubigeo->id); ?>" disabled="disabled" selected="selected" hidden="hidden"><?php echo e($almacen->ubigeo->distrito.'/'.$almacen->ubigeo->provincia.'/'.$almacen->ubigeo->departamento); ?></option>
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

                        <div class="col-12 col-md-6 py-1">
                            <label for="descripcion_id" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 140px"><?php echo e($almacen->descripcion); ?></textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 py-1">
                            <label for="" class="form-label">Carga una imagen(*)</label>
                            <div class="form-group text-center border bg-light mb-0">  
                                <img for="uploadImage2" id="uploadPreview2" width="auto" height="100" src="/images/planos/<?php echo e($almacen->plano); ?>" />   
                            </div>
                            <input id="uploadImage2" class="form-control form-control-sm my-2" value="<?php echo e($almacen->plano); ?>" type="file" name="plano" onchange="imagenEdit(2);"/>
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
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Actualizar almacen</button>   
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/configuracion-de-almacen/almacenes/edit.blade.php ENDPATH**/ ?>
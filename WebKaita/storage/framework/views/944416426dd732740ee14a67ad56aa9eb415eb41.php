<div class="modal fade" id="editetiquetas<?php echo e($etiqueta->slug); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar categoría</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/etiquetas/<?php echo e($etiqueta->slug); ?>">      
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                        <div class="py-1">
                            <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="<?php echo e($etiqueta->name); ?>" id="name_id" class="form-control fw-light form-control-sm" required maxLength="50">
                        </div>

                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo e($etiqueta->descripcion); ?></textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                            </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Actualizar etiqueta</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/configuracion-de-almacen/etiquetas/edit.blade.php ENDPATH**/ ?>
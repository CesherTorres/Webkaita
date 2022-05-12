<div class="modal fade" id="editunmedidas<?php echo e($medida->slug); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar categoría</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/medidas/<?php echo e($medida->slug); ?>">      
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="py-1">
                                <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?php echo e($medida->name); ?>" id="name_id" class="form-control fw-light form-control-sm" required maxLength="100">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="py-1">
                                <label for="abreviatura_id" class="form-label">Abreviatura<span class="text-danger">*</span></label>
                                <input type="text" name="abreviatura" value="<?php echo e($medida->abreviatura); ?>" id="abreviatura_id" class="form-control fw-light form-control-sm" required maxLength="100">
                            </div>
                        </div>
                    </div>
                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo e($medida->descripcion); ?></textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                            </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Actualizar unidad de medida</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/customer/www/neptundata.com/resources/views/configuracion-de-almacen/medidas/edit.blade.php ENDPATH**/ ?>
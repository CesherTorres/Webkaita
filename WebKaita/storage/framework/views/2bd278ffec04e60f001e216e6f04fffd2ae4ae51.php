<div class="modal fade" id="editcategorias<?php echo e($categoria->slug); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar categoría</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted text-start">(*) - Campos obligatorios</p>
                <form class="form-group" method="POST" action="/categorias/<?php echo e($categoria->slug); ?>">      
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                        <div class="py-1">
                            <label for="name_id" class="form-label">Nombre(*)</label>
                            <input type="text" name="name" value="<?php echo e($categoria->name); ?>" id="name_id" class="form-control fw-light form-control-sm" required maxLength="50">
                        </div>

                        <div class="py-1">
                            <label for="tipo_id" class="form-label">Tipo(*)</label>
                            <select class="form-select form-select-sm" name="tipo" id="tipo_id">
                                <option value="<?php echo e($categoria->tipo); ?>" disabled="disabled" selected="selected" hidden="hidden"><?php echo e($categoria->tipo); ?></option>
                                <option value="Materia prima">Materia prima</option>
                                <option value="Productos">Productos</option>
                                <option value="Activos">Activos</option>
                            </select>
                        </div>

                        <div class="py-1">
                            <label for="" class="form-label">Descripción(*)</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo e($categoria->descripcion); ?></textarea>
                                <label for="floatingTextarea2">Escribe un comentario</label>
                            </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Actualizar categoría</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/configuracion-de-almacen/categorias/edit.blade.php ENDPATH**/ ?>
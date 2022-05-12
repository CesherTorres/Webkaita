<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white py-2">
        <span class="modal-title" id="staticBackdropLabel">Nuevo cliente</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
      <div class="modal-body">
        <form class="form-group" method="POST" action="/clientes" enctype="multipart/form-data" autocomplete="off">      
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="py-1">
              <label for="identificacion_id" class="form-label">Tipo de identificación<span class="text-danger">*</span></label>
              <select name="identificacion" class="form-select form-select-sm" id="identificacion_id">
                  <option value="<?php echo e(old('identificacion')); ?>" disabled="disabled" selected="selected" hidden="hidden"><?php echo e(old('identificacion')); ?></option>
                  <option value="DNI">DNI</option>
                  <option value="RUC">RUC</option>
              </select>
              <?php $__errorArgs = ['identificacion'];
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
          <div class="col-12 col-md-6">
            <div class="py-1">
              <label for="nro_identificacion_id" class="form-label">Nro. de identificación<span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-sm" name="nro_identificacion" id="nro_identificacion_id">
            </div>
          </div>

          <div class="col-12">
            <div class="py-1">
              <label for="name_id" class="form-label">Nombres y Apellidos<span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-sm" name="name" id="name_id">
            </div>
          </div>

          <div class="col-12">
            <div class="py-1">
              <label for="direccion_id" class="form-label">Dirección<span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-sm" name="direccion" id="direccion_id">
            </div>
          </div>
        </div>
        <div class="text-center pt-4">
          <button type="submit" class="btn btn-primary px-5 text-white">Registrar cliente</button>   
        </div> 
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/customer/www/neptundata.com/resources/views/movimientos/salidas/cliente_create.blade.php ENDPATH**/ ?>
<div class="modal fade" id="chofer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white py-2">
        <span class="modal-title" id="staticBackdropLabel">Nuevo chofer</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
      <div class="modal-body">
        <form class="form-group" method="POST" action="/choferes" enctype="multipart/form-data" autocomplete="off">      
        @csrf

        <div class="row">
          <div class="col-12 col-md-6">
            <div class="py-1">
              <label for="identificacion_id" class="form-label">Tipo de identificación<span class="text-danger">*</span></label>
              <select name="identificacion" class="form-select form-select-sm" id="identificacion_id">
                  <option value="{{old('identificacion')}}" disabled="disabled" selected="selected" hidden="hidden">{{old('identificacion')}}</option>
                  <option value="DNI">DNI</option>
                  <option value="RUC">RUC</option>
              </select>
              @error('identificacion')
                  <small class="text-danger">{{$message}}</small>
              @enderror
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

          <div class="col-12">
            <div class="py-1">
              <label for="brevete_id" class="form-label">Brevete<span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-sm" name="brevete" id="brevete_id">
            </div>
          </div>

          <div class="col-12">
            <div class="py-1">
              <label for="placa_id" class="form-label">Nro. de Placa<span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-sm" name="placa" id="placa_id">
            </div>
          </div>

        </div>
        <div class="text-center pt-4">
          <button type="submit" class="btn btn-primary px-5 text-white">Registrar chofer</button>   
        </div> 
        
        </form>
      </div>
    </div>
  </div>
</div>
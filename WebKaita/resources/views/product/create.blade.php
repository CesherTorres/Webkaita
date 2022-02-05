<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: rgb(60, 190, 48);">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevas Caracteristicas del Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-between">
            <div class="col-lg-3">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Codigo: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control rounded-pill" id="inputPassword">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-end"><label>05/02/2022 12:00:00</label></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label col-xs-3 mt-1">Nombre</label>
                    <div class="controls col-xs-5">
                        <input type="text" class="form-control rounded-pill" placeholder="ingrese el nombre">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label col-xs-3 mt-1">Marca</label>
                    <div class="controls col-xs-5">
                        <input type="text" class="form-control rounded-pill" placeholder="ingrese la marca">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label col-xs-3 mt-1">U.M</label>
                    <select class="form-select rounded-pill" aria-label="Default select example">
                        <option selected>seleccione unidad de medida</option>
                        <option value="1">Kg.</option>
                        <option value="2">gr.</option>
                        <option value="3">Ltro.</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="input-group mb-3">
                    <label class="control-label col-xs-3 me-2 mt-1">Precio</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 30px 0px 0px 30px;" id="basic-addon1">S/</span>
                        </div>
                        <input type="text" class="form-control" style="border-radius: 5px 30px 30px 5px;" placeholder="0.00">
                    </div>
                </div>    
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label col-xs-3 me-2 mt-1">Temperatura de Conservacion</label>
                    <div class="controls col-xs-5">
                        <input type="text" class="form-control rounded-pill" placeholder="ingrese la temepratura">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label col-xs-3 me-2 mt-1">Categoria</label>
                    <select class="form-select rounded-pill" aria-label="Default select example">
                        <option selected>Seleccione una Categoria</option>
                        <option value="1">Citrico</option>
                        <option value="2">Extracto</option>
                        <option value="3">Aceite</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <label class="control-label col-xs-3 me-2 mt-1">Descripcion</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="control-label col-xs-3 me-2 mt-1">Beneficios</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="button" class="btn text-white me-4" style="background-color: rgb(60, 190, 48);">Guardar</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                    
                </div>

            </div>
            <div class="col-lg-6">
                <label for="title" class="form-label fw-bold">Imagen Destacada:</label>
                <div class="card" style="max-height: 250px" >
                    <img src="/images/camara_verde.png" class="p-4" width="auto" height="190"  id="uploadPreview1" alt="...">
                </div>
                <div class="my-3">
                    <input class="form-control form-control-sm" name="images" id="uploadImage1" onchange="previewImage(1);" type="file">
                </div>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>
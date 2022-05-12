<div class="modal fade" id="editmotivo{{$motivo->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar categoría</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/motivos/{{$motivo->slug}}">      
                    @csrf
                    @method('put')
                        <div class="py-1">
                            <label for="name_id" class="form-label">Tipo de motivo<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$motivo->name}}" id="name_id" class="form-control fw-light form-control-sm" required maxLength="50">
                        </div>

                        <div class="py-1">
                            <label for="tipo_motivo_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <select name="tipo_motivo" class="form-select form-select-sm" id="tipo_motivo_id">
                                <option value="{{$motivo->tipo_motivo}}" disabled="disabled" selected="selected" hidden="hidden">{{$motivo->tipo_motivo}}</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Salida">Salida</option>
                            </select>
                        </div>

                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$motivo->descripcion}}</textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                            </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Actualizar motivo de movimiento</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
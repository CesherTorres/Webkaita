<div class="modal fade" id="editareas{{$area->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Actualizar Área</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/areas/{{$area->slug}}" autocomplete="off">      
                    @csrf
                    @method('put')

                    <div class="py-1">
                        <label for="stores_id" class="form-label d-block">Seleccione almacén<span class="text-danger">*</span></label>
                        <select class="form-select select2 form-select-sm" name="store_id" id="stores_id" >
                            <option value="{{$area->store->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$area->store->name}}</option>
                            @foreach($almacenes as $almacen) 
                            <option value="{{$almacen->id}}">{{$almacen->name}}</option>
                            @endforeach
                        </select>
  
                    </div>
                    <div class="form-group py-1">
                        <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name_id" value="{{$area->name}}" class="form-control fw-light form-control-sm" required maxLength="100">
                    </div>

                    <div class="form-group py-1">
                        <label for="" class="form-label">Descripción</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="floatingTextarea2" style="height: 140px">{{$area->descripcion}}</textarea>
                            <label for="floatingTextarea2">Escribe un comentario</label>
                        </div>
                    </div>
                    
                    <div class="text-center pt-4">
                        <button type="submit" class="btn btn-primary px-5 text-white">Actualizar área</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
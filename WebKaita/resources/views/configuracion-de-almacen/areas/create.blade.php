<div class="modal fade" id="createareas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Nueva Área</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/areas" autocomplete="off">      
                    @csrf
                        <div class="py-1">
                            <label for="stores_id" class="form-label d-block">Seleccione almacén<span class="text-danger">*</span></label>
                            <select class="form-select select2 form-select-sm" name="store_id" id="stores_id" >
                                <option value="{{old('store_id')}}" disabled="disabled" selected="selected" hidden="hidden">{{old('store_id')}}</option>
                                @foreach($almacenes as $almacen) 
                                <option value="{{$almacen->id}}">{{$almacen->name}}</option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror    
                        </div>
                        <div class="py-1">
                            <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="{{old('name')}}"  maxLength="50">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{old('descripcion')}}</textarea>
                                <label for="floatingTextarea2">Escribe un comentario</label>
                            </div>
                            @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Registrar área</button>   
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
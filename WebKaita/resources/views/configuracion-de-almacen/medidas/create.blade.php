<div class="modal fade" id="createunmedidas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Nueva unidad de medida</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/medidas">      
                    @csrf
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="py-1">
                                    <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="{{old('name')}}"  maxLength="100">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="py-1">
                                    <label for="abreviatura_id" class="form-label">Abreviatura<span class="text-danger">*</span></label>
                                    <input type="text" name="abreviatura" id="abreviatura_id" class="form-control fw-light form-control-sm" value="{{old('alias')}}"  maxLength="100">
                                    @error('abreviatura')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="py-1">
                            <label for="" class="form-label">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="floatingTextarea2" style="height: 140px">{{old('descripcion')}}</textarea>
                                <label for="floatingTextarea2">Escribe una descripción</label>
                                @error('descripcion')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-primary px-5 text-white">Registrar unidad de medida</button>   
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
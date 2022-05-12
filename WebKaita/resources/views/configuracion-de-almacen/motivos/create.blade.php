<div class="modal fade" id="createmotivos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <span class="modal-title" id="staticBackdropLabel">Nuevo motivo de movimiento</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p class="">Para agregar un nuevo motivo de movimiento, ponerse en contacto con el desarrollador.</p>
                    <img src="svg/programador.svg" class="pb-3" width="300" alt="">
                </div>
                {{-- <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <form class="form-group" method="POST" action="/motivos">      
                    @csrf
                        <div class="py-1">
                            <label for="name_id" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="{{old('name')}}"  maxLength="100">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="py-1">
                            <label for="tipo_motivo_id" class="form-label">Tipo de motivo<span class="text-danger">*</span></label>
                            <select name="tipo_motivo" class="form-select form-select-sm" id="tipo_motivo_id">
                                <option value="{{old('tipo_motivo')}}" disabled="disabled" selected="selected" hidden="hidden">{{old('tipo_motivo')}}</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Salida">Salida</option>
                            </select>
                            @error('tipo_motivo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
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
                            <button type="submit" class="btn btn-primary px-5 text-white">Registrar motivo de movimiento</button>   
                        </div>  
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
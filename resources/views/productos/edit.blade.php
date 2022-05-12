@extends('templates.templateDashboard')

@section('title', 'Productos')

@section('css')
<link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
<style>
  .hasImage:hover section {
    background-color: rgba(5, 5, 5, 0.4);
  }

  .hasImage:hover button:hover {
    background: rgba(5, 5, 5, 0.45);
  }
  
  #overlay p,
  .icon-upload {
    opacity: 0;
  }
  
  #overlay.draggedover {
    background-color: rgba(255, 255, 255, 0.7);
  }

  #overlay.draggedover p,
  #overlay.draggedover i {
    opacity: 1;
  }
  
  .group:hover .group-hover\:text-blue-800 {
    color: #2b6cb0;
  }

  input[type="number"]{
    -moz-appearance: textfield;
    text-align: center;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
    margin: 0;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Encabezado -->
  <div class="row pt-5">
    <div class="col-lg-9">
        <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Productos</h1>
        <p class="text-muted">Actualiza un registro de productos.</p>
    </div>
    <div class="col-lg-3 d-flex">
    </div>
  </div>
<!-- fin encabezado -->
 
{{-- breacrumb --}}
  <div class=" py-2">
    <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none link-primary" href="">Almacen</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none link-primary" href="{{url('productos')}}">Productos</a></li>
        <li class="breadcrumb-item" aria-current="page">Actualizar nombre de producto</li>
      </ol>
    </div>
  </div> 
{{-- fin breacrumb --}}

{{-- Contenido --}}

{!! Form::model($producto,['route' => ['productos.update', $producto], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
    <div class="card border-4 borde-top-primary shadow-sm py-2">
      <input type="date" name="fecha" id="fecha_id" value="{{$producto->fecha}}" class="float-end hidden form-control form-control-sm  fw-light" value="{{old('fecha')}}" maxLength="100">
        <div class="card-body">
            <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
            <div class="row">
                <div class="col-12 col-md-3 py-1">
                    <label for="codigo_id" class="form-label d-block">Código <span class="text-danger">*</span></label>
                    <input type="text" name="codigo" id="codigo_id" class="float-end form-control form-control-sm  fw-light" value="{{$producto->codigo}}" maxLength="100">  
                    @error('codigo')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-3 py-1">
                  <label for="tipos_id" class="form-label d-block">Tipo de producto<span class="text-danger">*</span></label>
                  <select class="form-select select2 form-select-sm" name="tipo_id" id="tipos_id" >
                    <option value="{{$producto->tipo->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->tipo->name}}</option>
                    @foreach($tipos as $tipo) 
                      <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                    @endforeach
                  </select>
                  @error('tipo_id')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="col-12 col-md-4 py-1">
                    <label for="name_id" class="form-label d-block">Nombre de producto <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name_id" class="float-end form-control form-control-sm  fw-light" value="{{$producto->name}}" maxLength="100">  
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-2 py-1">
                    <label for="unidads_id" class="form-label d-block">Unidad de medida <span class="text-danger">*</span></label>
                    <select class="form-select select2 form-select-sm" name="medida_id" id="unidads_id" >
                        <option value="{{$producto->medida->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->medida->name}}</option>
                        @foreach($medidas as $medida) 
                        <option value="{{$medida->id}}">{{$medida->name.' - '.$medida->alias}}</option>
                        @endforeach
                    </select>
                    @error('medida_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-3 py-1">
                    <label for="categorias_id" class="form-label d-block">Categoría <span class="text-danger">*</span></label>
                    <select class="form-select select2 form-select-sm" name="category_id" id="categorias_id" >
                        <option value="{{$producto->category->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->category->name}}</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-3 py-1">
                    <label for="marcas_id" class="form-label d-block">Marca <span class="text-danger">*</span></label>
                    <select class="form-select select2 form-select-sm" name="marca_id" id="marcas_id" >
                        <option value="{{$producto->marca->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->marca->name}}</option>
                        @foreach($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->name}}</option>
                        @endforeach
                    </select>
                    @error('marca_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-3 py-1">
                    <label for="temperatura_id" class="form-label d-block">Temperatura de conservación <span class="text-danger">*</span></label>
                    <input type="text" name="temperatura" id="temperatura_id" class="float-end form-control form-control-sm  fw-light" value="{{$producto->temperatura}}" maxLength="100">  
                    @error('temperatura')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-3 py-1">
                    <label for="precio_id" class="form-label d-block">Precio <span class="text-danger">*</span></label>
                    <input type="number" min="1" max="500" name="precio" id="precio_id" class="float-end form-control form-control-sm  fw-light" value="{{$producto->precio}}" maxLength="100">  
                    @error('precio')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-5 py-1">
                        <label for="descripcion_id" class="form-label">Descripción <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="descripcion" id="descripcion_id" placeholder="Escribe una descripción" style="height: 160px">{{$producto->descripcion}}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-5 py-1">
                        <label for="beneficios_id" class="form-label">Beneficios <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="beneficios" placeholder="escribe los beneficios de los productos" id="beneficios_id" style="height: 160px">{{$producto->beneficios}}</textarea>
                    @error('beneficios')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-9 col-md-2 py-1">
                    <label for="" class="form-label">Imagen Principal <span class="text-danger">*</span></label>
                    <div class="card text-center imagecard rounded bg-light mb-0" style="height: 160px">  
                        <label for="uploadImage1" class=" my-auto text-center">
                            <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 100%; height: 156px;" src="/images/productos/{{$producto->imagen}}">   
                        </label>
                    </div>
                    <input id="uploadImage1" class="form-control-file" type="file" value="{{$producto->imagen}}" name="imagen" onchange="previewImagePrincipal(1);" hidden/>
                    @error('imagen')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div aria-label="File Upload Modal" class="relative h-full flex flex-col" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                      <!-- scroll area -->
                      <section class="h-full overflow-auto py-8 px-1 w-full h-full flex flex-col">
                        <span>
                          Agregar imágenes (opcional)
                          <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Subir imágenes" data-bs-content="Puedes subir más imagenes relacionadas al producto que quieres agregar, se recomienda subir todas las imagenes juntas que se hallan seleccionado"><i class="bi bi-question-lg"></i></button>
                        </span>
                        <input id="hidden-input" name="imagenes[]" type="file" multiple class="hidden" />
                          <div id="button" style="cursor: pointer" class="col-12 col-md-3 mt-2 rounded-sm px-3 py-1 btn btn-secondary text-white">
                              Agregar imagenes
                          </div>
                          
                          <br>
                        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                          <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                            <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                            <span class="text-small text-gray-500">No hay archivos seleccionados</span>
                          </li>
                        </ul>
                      </section>
                    </div>
                    <!-- using two similar templates for simplicity in js code -->
                    <template id="file-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 h-24">
                        <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                            <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />
                
                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                <div class="flex">
                                    <span class="p-1 text-blue-800">
                                        <i>
                                            <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                            </svg>
                                        </i>
                                    </span>
                                    <p class="p-1 size text-xs text-gray-700"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                        </li>
                    </template>
                    <template id="image-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 h-24">
                            <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />
                                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1"></h1>
                                    <div class="flex">
                                        <span class="p-1">
                                            <i>
                                                <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                                </svg>
                                            </i>
                                        </span>
                        
                                        <p class="p-1 size text-xs"></p>
                                        <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                            </svg>
                                        </button>
                                    </div>
                                </section>
                            </article>
                        </li>
                    </template>
                </div>
                <div class="col-12 pt-2">
                    <label for="" class="form-label">Imagen opcionales agregadas <span class="text-danger">*</span></label>
                    <div class="row">
                        @foreach($producto->images as $image)
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center imagecard rounded bg-light mb-0" style="height: 160px">  
                                    <label class=" my-auto text-center">
                                        <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 100%; height: 156px;" src="{{$image->url}}">   
                                    </label>
                                    <div class="card-img-overlay">
                                        <a type="button" href="/images/{{$image->id}}/delete" class="btn btn-danger btn-sm float-end"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 pt-4">
                    <label class="form-label">Etiquetas<span class="text-danger">*</span></label>
                    <div class="row">
                        @foreach($etiquetas as $etiqueta)           
                        <div class="col-12 col-md-2 py-1">
                             <label>
                                 {!! Form::checkbox('etiquetas[]', $etiqueta->id) !!}
                                 {{$etiqueta->name}}
                             </label>                         
                         </div>  
                         @endforeach  
                     </div> 
                </div>
            </div>
        
        </div>
    </div>

    <div class="my-4 text-end">
        <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Actualizar nombre de producto</button>
        <a href="{{url('productos')}}" class="btn btn-outline-secondary">Cancelar</a>
    </div>  
{!! Form::close() !!}
  
  
{{-- Fin contenido --}}   
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function previewImagePrincipal(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };     
    }
</script>
<script>
    const fileTempl = document.getElementById("file-template"),
      imageTempl = document.getElementById("image-template"),
      empty = document.getElementById("empty");
    
    // use to store pre selected files
    let FILES = {};
    
    // check if file is of type image and prepend the initialied
    // template to the target element
    function addFile(target, file) {
      const isImage = file.type.match("image.*"),
        objectURL = URL.createObjectURL(file);
    
      const clone = isImage
        ? imageTempl.content.cloneNode(true)
        : fileTempl.content.cloneNode(true);
    
      clone.querySelector("h1").textContent = file.name;
      clone.querySelector("li").id = objectURL;
      clone.querySelector(".delete").dataset.target = objectURL;
      clone.querySelector(".size").textContent =
        file.size > 1024
          ? file.size > 1048576
            ? Math.round(file.size / 1048576) + "mb"
            : Math.round(file.size / 1024) + "kb"
          : file.size + "b";
    
      isImage &&
        Object.assign(clone.querySelector("img"), {
          src: objectURL,
          alt: file.name
        });
    
      empty.classList.add("hidden");
      target.prepend(clone);
    
      FILES[objectURL] = file;
    }
    
    const gallery = document.getElementById("gallery"),
      overlay = document.getElementById("overlay");
    
    // click the hidden input of type file if the visible button is clicked
    // and capture the selected files
    const hidden = document.getElementById("hidden-input");
    document.getElementById("button").onclick = () => hidden.click();
    hidden.onchange = (e) => {
      for (const file of e.target.files) {
        addFile(gallery, file);
      }
    };
    
    // use to check if a file is being dragged
    const hasFiles = ({ dataTransfer: { types = [] } }) =>
      types.indexOf("Files") > -1;
    
    // use to drag dragenter and dragleave events.
    // this is to know if the outermost parent is dragged over
    // without issues due to drag events on its children
    let counter = 0;
    
    // reset counter and append file to gallery when file is dropped
    function dropHandler(ev) {
      ev.preventDefault();
      for (const file of ev.dataTransfer.files) {
        addFile(gallery, file);
        overlay.classList.remove("draggedover");
        counter = 0;
      }
    }
    
    // only react to actual files being dragged
    function dragEnterHandler(e) {
      e.preventDefault();
      if (!hasFiles(e)) {
        return;
      }
      ++counter && overlay.classList.add("draggedover");
    }
    
    function dragLeaveHandler(e) {
      1 > --counter && overlay.classList.remove("draggedover");
    }
    
    function dragOverHandler(e) {
      if (hasFiles(e)) {
        e.preventDefault();
      }
    }
    
    // event delegation to caputre delete events
    // fron the waste buckets in the file preview cards
    gallery.onclick = ({ target }) => {
      if (target.classList.contains("delete")) {
        const ou = target.dataset.target;
        document.getElementById(ou).remove(ou);
        gallery.children.length === 1 && empty.classList.remove("hidden");
        delete FILES[ou];
      }
    };
    
    // print all selected files
    document.getElementById("submit").onclick = () => {
      alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
      console.log(FILES);
    };
    
    // clear entire selection
    document.getElementById("cancel").onclick = () => {
      while (gallery.children.length > 0) {
        gallery.lastChild.remove();
      }
      FILES = {};
      empty.classList.remove("hidden");
      gallery.append(empty);
    };
  </script>

<script>
<script>
  // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.select2').select2();
  });
</script>
@endsection

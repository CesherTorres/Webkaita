@extends('templates.templateDashboard')

@section('title', 'Nuevo movimiento de ingreso')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="/js/jquery-3.6.0.min.js"></script>
<style>
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
@endsection

@section('content')
    @inject('almacenes', 'App\service\Almacen')
    @inject('tipos', 'App\service\Tipo_producto')
    @inject('chofer', 'App\service\Choferes')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-10">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="text-muted">Registra un nuevo movimiento de ingreso.</p>
            </div>
            <div class="col-lg-2">
                <div class="align-self-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <label class="fw-bold d-block">N° de movimiento</label>
                            <span class="badge bg-dark fs-6 p-2">{{$codigo}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- fin encabezado -->
 
    {{-- breacrumb --}}
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="pt-3 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('ingresos')}}">Movimientos</a></li>
                    <li class="breadcrumb-item" aria-current="page">Nuevo movimiento de ingreso</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
    {{-- fin breacrumb --}}

    {{-- Contenido --}} 
    <form class="form-group" method="POST" action="/ingresos" enctype="multipart/form-data" autocomplete="off">      
        @csrf
        <div class="card border-4 borde-left-primary shadow-sm py-2 mb-4">
            <div class="card-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <div class="row">
                    <div class="col-12 col-md-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label style="font-size:15px" for="">Motivo de movimiento<span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <select class="form-select form-select-sm select2" onChange="mostrar(this)" id="motivo_id" name="" aria-label=".form-select-sm example">
                                    <option selected hidden>Seleccione un motivo</option>
                                    @foreach($motivos as $motivo)  
                                        <option value="{{$motivo->id}}_{{$motivo->name}}">{{$motivo->name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="_motivos">
                                <input type="hidden" id="name_motivos" name="motivo_id">
                                <input type="hidden" id="invent" name="invents">
                            </div>
                            @error('motivo_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12 col-md-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="_tipo">Tipo de producto<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm select2" id="_tipo" name="_tipo" aria-label=".form-select-sm example">
                                @foreach($tipos->get() as $index => $nametipos)
                                    <option value="{{$index}}">{{$nametipos}}</option>
                                @endforeach
                            </select>
                            @error('tipo_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3 py-1">
                        <label for="">Guía de remisión</label>
                        <input type="text" class="form-control form-control-sm" name="nguia" id="nguia" placeholder="Ingrese Nro de guía de remision">
                    </div>                    
                    
                    <div class="col-12 col-md-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Fecha de movimiento<span class="text-danger">*</span></label>
                            <input type="date" name="fecha" class="form-control form-control-sm" value="{{$now->format('Y-m-d')}}">
                            @error('fecha')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                    </div>
                   
                    <div class="col-12 col-md-4 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="_store_destino">Ingresa a<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm select2" name="_store_destino" id="_store_destino" aria-label=".form-select-sm example">
                                @foreach($almacenes->get() as $index => $name)
                                    <option value="{{$index}}">{{$name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="store_id" id="id_de_almacen">
                            @error('store_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 py-1" id="select_salida">
                        <div class="form-group my-2 my-md-0">
                            <label for="_store_salida">Envía</label>
                            <select class="form-select form-select-sm select2" style="width: 100%" name="_store_salida" id="_store_salida" aria-label=".form-select-sm example">
                                @foreach($almacenes->get() as $index => $name)
                                    <option value="{{$name}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

        <div class="card border-4 borde-top-primary shadow-sm py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Producto</label>
                            <select class="form-select form-select-sm select2" id="_producto" aria-label=".form-select-sm example">
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Lote</label>
                            <input type="number" id="lote" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Orden de fabricación</label>
                            <input type="text" id="ordenfabricacion" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Cantidad</label>
                            <input type="number" min="1" max="500" class="form-control form-control-sm" id="cantidad">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Fecha de vencimiento</label>
                            <input type="date" class="form-control form-control-sm" id="fechavencimiento" value="{{$now->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Observaciones</label>
                            <input type="text" class="form-control form-control-sm" id="observaciones">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Precio</label>
                            <input type="number" min="1" class="form-control form-control-sm" id="precios">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Área de destino</label>
                            <select class="form-select form-select-sm select2" id="_area" aria-label=".form-select-sm example">
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 py-1 d-flex">
                        <button type="button" id="btnagregar" class="btn btn-secondary btn-sm w-100 align-self-end text-white mt-2 mt-md-0" id="">
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table" id="detalles">
                        <thead>
                          <tr>
                            <th class="fw-bold" >Código Prod.</th>
                            <th class="fw-bold">Producto</th>
                            <th class="fw-bold">Precio</th>
                            <th class="fw-bold">Lote</th>
                            <th class="fw-bold">Orden de Fab.</th>
                            <th class="fw-bold">Fec. Vencimiento</th>
                            <th class="fw-bold">Área Destino</th>
                            <th class="fw-bold">Observaciones</th>
                            <th class="fw-bold">Cantidad</th>
                            <th class="fw-bold"></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                <div class="row">
                   <div class="col-4"></div>
                    <div class="py-2 col-12 col-md-8 text-end">
                        <label for="">Cantidad total de productos</label>
                        <p class="fw-bold text-primary fs-3" id="tproductos">0</p><input type="hidden" id="total_product" name="total_product">
                        @error('total_product')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
               
            </div>
        </div>
        
        <div class="text-end py-3">
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Registrar movimiento de ingreso</button> 
            <a href="{{url('ingresos')}}" class="btn btn-outline-secondary">Cancelar</a>  
        </div>
    </form>
    {{-- Fin contenido --}}    
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
$('.select2').select2({
            width:'resolve'
        });
});
</script>
{{-- este codigo es para el filtrado de los almacenes --}}
<script>
function mostrar (select) {
  select.disabled = true;
}
</script>
<script>
        $("#select_salida").hide();
        $("#saliendo_de").hide();
        $("#destino_de").hide();
        $("#area_de").hide();
        $("#chofer_de").hide();
        function mostrar(id)
        {
            var combo = document.getElementById("motivo_id").value.split('_');
            $("#name_motivos").val(combo[0]);
            $("#_motivos").val(combo[1]);
            var _motivos = $("#_motivos").val();

            if (_motivos == "Traslado")
            {
                console.log(_motivos);
                $("#select_salida").show();
                $("#saliendo_de").show();
                $("#destino_de").show();
                $("#chofer_de").show();

            }else{
                $("#select_salida").hide();
                $("#saliendo_de").hide();
                $("#destino_de").hide();
                $("#chofer_de").hide();
            }
            
        }
</script>
<script>
    $(document).ready(function() {
        $('#_store_destino').on('change', function(){
            var store_id = $(this).val();
            if($.trim(store_id) !=''){
                $.get('/entrada/destino', {store_id: store_id}, function(areass){
                    $('#_area').empty();
                    $('#_area').append("<option value=''>Selecciona una Area</option>");
                    $.each(areass, function(index, value){
                        $('#_area').append("<option value='"+index[0]+"'>"+value[0]+"</option>");
                        $('#ingreso_destino').val(""+value[1]+"");
                        $('#ingreso_direccion').val(""+value[2]+"");
                        $('#ingreso_descripcion').val(""+value[3]+"");
                        $('#id_de_almacen').val(store_id);
                    })
                });
            }
        });
        $('#_store_salida').on('change', function(){
            var store_id = $(this).val();
            if($.trim(store_id) !=''){
                $.get('/entrada/salida_de', {store_id: store_id}, function(almacen){
                    $.each(almacen, function(index, value){
                        $('#salida_destino').val(""+value[0]+"");
                        $('#salida_direccion').val(""+value[1]+"");
                        $('#salida_descripcion').val(""+value[2]+"");
                    })
                });
            }
        });
        $('#id_choferes').on('change', function(){
            var chofer_id = $(this).val();
            if($.trim(chofer_id) !=''){
                $.get('/salidas/choferes', {chofer_id: chofer_id}, function(identidad){
                    $('#namechofer').empty();
                    console.log(chofer_id);
                    $('#namechofer').val("<input type='text' class='form-control form-control-sm'>");
                    $.each(identidad, function(index, value){
                        console.log(index);
                        $('#namechofer').val(""+value[0]+"");
                        $('#domi_chofer').val(""+value[1]+"");
                        $('#brevete_plca').val(""+value[2]+ '/' +value[3]+"");
                    })
                });
            }
        });
        $('#_tipo').on('change', function(){
            var tipo_id = $(this).val();
            if($.trim(tipo_id) !=''){
                $.get('/producto/filtro', {tipo_id: tipo_id}, function(productoss){
                    $('#_producto').empty();
                    $('#_producto').append("<option value=''>Selecciona un Producto</option>");
                    $.each(productoss, function(index, value){
                        $('#_producto').append("<option value='"+index+"'>"+value+"</option>");
                    })
                });
            }
        });
    });
</script>

<script>
    function previewImage(nb) {        
      var reader = new FileReader();         
      reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
      reader.onload = function (e) {             
          document.getElementById('uploadPreview'+nb).src = e.target.result;         
      };     
    }
</script>

<script>
    // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        $('.select2').select2();
    });
</script>
{{-- <script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_tipo').addEventListener('change',(e)=>{
        fetch('incomeproduct',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json();
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.listaproduct) {
               opciones+= '<option value="'+data.listaproduct[i].id+'">'+data.listaproduct[i].name+'</option>';
            }
            document.getElementById("_producto").innerHTML = opciones;
        }).catch(error =>console.error(error));
    });
    document.getElementById('_store').addEventListener('change',(e)=>{
        fetch('incomearea',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json();
        }).then( data =>{
            var opciones2 ="";
            for (let i in data.listaarea) {
               opciones2+= '<option value="'+ data.listaarea[i].id +'">' + data.listaarea[i].name +'</option>';
            }
            document.getElementById("_area").innerHTML = opciones2;
        }).catch(error =>console.error(error));
    });
</script> --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#btnagregar').click(function(){
            agregar();
        });
    });

    var cont = 0;
    tproductos=0;
    cantidades=[];
    function agregar()
    {
        idproducto = $("#_producto").val();
        producto = $("#_producto option:selected").text();
        lote = $("#lote").val();
        precio = $("#precios").val();
        ordenfabricacion = $("#ordenfabricacion").val();
        cantidad = $("#cantidad").val();
        fechavencimiento = $("#fechavencimiento").val();
        observaciones = $("#observaciones").val();
        area = $("#_area option:selected").text();
        almacen_ids = $("#_store_destino").val();

        if (producto!="" && lote!="" && ordenfabricacion!="" && cantidad>0 && cantidad!=""  && area!="" && precio!="") 
        {
            cantidades[cont]=Number(cantidad);
            tproductos = tproductos+cantidades[cont];
            var fila = '<tr class="selected" id="fila'+cont+'"><td class="align-middle fw-light">'+idproducto+'</td><td class="align-middle fw-light"><input type="hidden" name="almacen_id[]" value="'+almacen_ids+'"><input type="hidden" name="producto[]" value="'+idproducto+'">'+producto+'</td><td class="align-middle fw-light"><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><td class="align-middle fw-light"><input type="hidden" name="lote[]" value="'+lote+'">'+lote+'</td><td class="align-middle fw-light"><input type="hidden" name="ordenfabricacion[]" value="'+ordenfabricacion+'">'+ordenfabricacion+'</td><td class="align-middle fw-light"><input type="hidden" name="fechavencimiento[]" value="'+fechavencimiento+'">'+fechavencimiento+'</td><td class="align-middle fw-light"><input type="hidden" name="area[]" value="'+area+'">'+area+'</td><td class="align-middle fw-light"><input type="hidden" name="observaciones[]" value="'+observaciones+'">'+observaciones+'</td><td class="align-middle fw-light"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidades[cont]+'</td><td class="align-middle"><button class="btn btn-sm btn-danger" onclick="eliminar('+cont+');"><i class="bi bi-trash"></i></button></td></tr>';
            cont++;
            console.log(+tproductos);
            limpiar();
            $("#tproductos").html(+tproductos);
            $("#total_product").val(tproductos);
            $('#detalles').append(fila);
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error al ingresar el detalle del ingreso, revise los datos del producto',
                })
        }
    }
    function limpiar()
    {
        $("#lote").val("");
        $("#ordenfabricacion").val("");
        $("#cantidad").val("");
        $("#observaciones").val("");
    }
    function eliminar(index)
    {
        tproductos = tproductos-cantidades[index];
        $("#tproductos").html(+tproductos);
        $("#total_product").val(tproductos);
        $("#fila" + index).remove();
    }
</script>
@endpush


@extends('templates.templateDashboard')

@section('title', 'Nuevo movimiento de salida')

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
    @inject('cliente', 'App\service\Clientes')
    @inject('chofer', 'App\service\Choferes')
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-10">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="text-muted">Registra un nuevo movimiento de salida.</p>
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
        <div class="col-12 col-md-6 pt-3 pt-md-0">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('salidas')}}">Movimientos</a></li>
                    <li class="breadcrumb-item" aria-current="page">Nuevo movimiento de salida</li>
                </ol>
            </div>
        </div>
    </div>
    {{-- fin breacrumb --}}
    {{-- Contenido --}} 
    <form class="form-group" method="POST" action="/salidas" enctype="multipart/form-data" autocomplete="off">      
        @csrf
        <div class="card border-4 borde-left-primary shadow-sm py-2 mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Motivo de movimiento</label>
                            <select class="form-select form-select-sm" onChange="mostrar(this.value)" id="id_motivo" aria-label=".form-select-sm example">
                                <option selected hidden>Seleccione un motivo</option>
                                @foreach($motivos as $motivo)  
                                    <option data-movimiento="{{$motivo->tipo_motivo}}" value="{{$motivo->id}}_{{$motivo->name}}">{{$motivo->name}}</option>
                                @endforeach
                              </select>
                            <input type="hidden" id="_motivos">
                            <input type="hidden" id="name_motivos" name="motivo_id">
                            <input type="text" id="invent" name="invents">
                            @error('motivo_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group my-2 my-md-0">
                            <label for="_tipo">Tipo de producto</label>
                            <select class="form-select form-select-sm" id="_tipo" name="tipo_id" aria-label=".form-select-sm example">
                                <option selected hidden>Seleccione un tipo</option>
                                @foreach($tipos->get() as $index => $nametipos)
                                    <option value="{{$index}}">{{$nametipos}}</option>
                                @endforeach
                            </select>
                            @error('tipo_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" id="chofer_de">
                        <div class="form-group my-2 my-md-0">
                            <div class="clearfix">
                                <label for="id_choferes">Chofer Responsable</label>
                                <a class="badge btn-sm border-0 bg-primary mb-1 float-end" style="text-decoration: none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#chofer">+ Nuevo</a>
                            </div>
                            <select class="form-select form-select-sm select2" style="width: 100%" name="chofer_id" id="id_choferes" aria-label=".form-select-sm example">
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">Seleccione</option>
                                @foreach($choferes as $chofer)
                                    <option value="{{$chofer->id}}">{{$chofer->brevete.' - '.$chofer->name}}</option>
                                @endforeach    
                            </select>
                            @error('chofer_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" id="cliente_de">
                        <div class="form-group my-2 my-md-0">
                            <div class="clearfix">
                                    <label for="clientes_id">Cliente</label>
                                    <a class="badge btn-sm border-0 bg-primary mb-1 float-end" style="text-decoration: none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Nuevo</a>
                            </div>
                            <select class="form-select form-select-sm select2" style="width: 100%" name="cliente_id" id="clientes_id" aria-label=".form-select-sm example">
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">Seleccione</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nro_identificacion.' - '.$cliente->name}}</option>
                                @endforeach    
                            </select>
                            @error('cliente_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card border-4 borde-left-primary shadow-sm py-2 mb-2" id="select_motivo">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4" id="salida_de">
                        <div class="form-group my-2 my-md-0">
                            <label for="_store">Origen</label>
                            <select class="form-select form-select-sm select2" style="width: 100%" name="store_id" id="_store" aria-label=".form-select-sm example">
                                @foreach($almacenes->get() as $index => $name)
                                    <option value="{{$index}}">{{$name}}</option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4" id="entrada_de">
                        <div class="form-group my-2 my-md-0">
                            <label for="_entrada">Destino</label>
                            <select class="form-select form-select-sm select2" style="width: 100%" name="_entrada_id" id="_entrada" aria-label=".form-select-sm example">
                                @foreach($almacenes->get() as $index => $name)
                                    <option value="{{$name}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="date" name="fecha" hidden class="form-control form-control-sm" value="{{$now->format('Y-m-d')}}">
                    <div class="col-12 col-md-6 col-lg-4" id="forma_de">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Forma de Pago</label>
                            <select class="form-select form-select-sm" name="forma_pago" id="forma_pago" aria-label=".form-select-sm example">
                                <option selected hidden>Seleccione una opcion</option>
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group pb-2 my-md-0">
                            <label for="numeroserie">Nro. Serie/Nro. Guía</label>
                            <div class="input-group input-group-sm">
                                <input type="text" aria-label="First name" name="nroserie" id="numeroserie" placeholder="nro. serie" class="form-control">
                                <input type="text" aria-label="Last name" name="nroguia" id="numeroguia" placeholder="nro. guía" class="form-control">
                            </div>
                            @error('nro_serie_guia')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            @error('nguia')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4" id="comprobante">
                        <div class="form-group pb-2 my-md-0">
                            <label for="">Comprobante</label>
                            <select class="form-select form-select-sm" id="tipo_comprobante" name="tipo_comprobante" aria-label=".form-select-sm example">
                                <option hidden>Seleccione un comprobante</option>
                                <option value="Factura">Factura</option>
                                <option value="Boleta">Boleta</option>
                                <option value="Nota de salida">Nota de salida</option>
                            </select>       
                        </div>             
                    </div>
                    <div class="col-12 col-md-4" id="numerocomprobante">
                        <div class="form-group pb-2 my-md-0">
                            <label for="">Nro. de Comprobante</label>
                            <input type="text" class="form-control form-control-sm" name="nrocomprobante" id="nrocomprobante" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-4 borde-top-primary shadow-sm py-2 mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="_producto">Producto</label>
                            <select class="form-select form-select-sm select2"  id="_producto" aria-label=".form-select-sm example">
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="_lote">Lote</label>
                            <select class="form-select form-select-sm select2"  id="_lote" aria-label=".form-select-sm example">
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Orden de Fabricacion</label>
                            <input type="text" disabled id="ordenfabricacion" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Cantidad</label>
                            <input type="number" min="1" max="500" class="form-control form-control-sm" id="cantidad">
                            <input type="hidden" class="form-control form-control-sm" name="cantidad2" id="cantidad2">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Fecha de vencimiento</label>
                            <input type="date" disabled class="form-control form-control-sm" id="fechavencimiento">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-12 col-md-4 col-lg-4 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Observaciones</label>
                            <input type="text" class="form-control form-control-sm" id="observaciones">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Precio</label>
                            <input type="number" disabled min="1" class="form-control form-control-sm" id="precios">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Peso Total</label>
                            <input type="number" min="1" max="500" class="form-control form-control-sm" id="peso_total">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 py-1 d-flex text-end">
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
                            <th class="fw-bold">Orden de Fabricacion.</th>
                            <th class="fw-bold">Fec. Vencimiento</th>
                            <th class="fw-bold">Observaciones</th>
                            <th class="fw-bold">Cantidad</th>
                            <th class="fw-bold">Peso Total</th>
                            <th class="fw-bold"></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-between">
                    <div class="py-2 col-12 col-md-3">

                    </div>
                    <div class="py-2 col-12 col-md-3 text-end">
                        <label for="">Cantidad total de productos</label>
                        <p class="fw-bold text-primary fs-3" id="tproductos">0</p><input type="number" hidden id="total_product" name="total_product">
                        @error('total_product')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
               
            </div>
        </div>
        <div class="text-end py-3">
            <button type="submit" class="btn btn-primary px-5 text-white">Registrar movimiento de salida</button> 
            <a href="{{url('ingresos')}}" class="btn btn-outline-secondary">Cancelar</a>  
        </div>
    </form>
    @include('movimientos.salidas.cliente_create')
    @include('movimientos.salidas.chofer_create')
    {{-- Fin contenido --}}    
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--  --}}
<script>
$(document).ready(function(){
$('.select2').select2({
            width:'resolve'
        });
});
</script>
<script>
        $("#select_motivo").hide()
        $("#comprobante").hide()
        $("#numerocomprobante").hide();
        $("#saliendo_de").hide();
        $("#entrada_de").hide();
        $("#salida_de").hide();
        $("#cliente_de").hide();
        $("#area_de").hide();
        $("#chofer_de").hide();
        $("#forma_de").hide();
        function mostrar(id)
        {
            //console.log($("#id_motivo option:selected").attr("data-movimiento"));
            var combo = document.getElementById("id_motivo").value.split('_');
            $("#name_motivos").val(combo[0]);
            $("#_motivos").val(combo[1]);
            var _motivos = $("#_motivos").val();
            if (_motivos == "Venta" || "Obsequio" || "Promociones" || "Bonificaciones" || "Devolución" || "Mantenimiento(recuperación)" || "Descuento")
            {
                $("#select_motivo").show()
                $("#comprobante").show()
                $("#numerocomprobante").show();
                $("#salida_de").show();
                $("#saliendo_de").hide();
                $("#entrada_de").hide();
                $("#descripcion_de").hide();
                $("#direccion_de").hide();
                $("#operacion_de").show();
                $("#forma_de").show();
                $("#cliente_de").show();
                $("#chofer_de").show();
            }
            if (_motivos == "Traslado de almacén")
            {
                $("#select_motivo").show()
                $("#comprobante").show()
                $("#numerocomprobante").show();
                $("#salida_de").show();
                $("#saliendo_de").show();
                $("#entrada_de").show();
                $("#descripcion_de").show();
                $("#direccion_de").show();
                $("#operacion_de").hide();
                $("#forma_de").hide();
                $("#cliente_de").show();
                $("#chofer_de").show();
            }
            
        }
</script>
{{--  --}}
{{-- este codigo es para el filtrado de los almacenes --}}
<script>
    $(document).ready(function() {

        $('#_store').on('change', function(){
            var store_id = $(this).val();
            if($.trim(store_id) !=''){
                $.get('/salidas/almacen', {store_id: store_id}, function(areass){
                    $('#direccion1').empty();
                    $('#direccion1').append("<input type='text' class='form-control form-control-sm'>");
                    $('#_producto').empty();
                    $('#_producto').append("<option value=''>Selecciona un Producto</option>");
                    $.each(areass, function(index, value){
                        if(value[3]===null){
                            $('#salida_destino').val(""+value[0]+"");
                            $('#salida_direccion').val(""+value[1]+"");
                            $('#salida_descripcion').val(""+value[2]+"");
                            $('#numeroserie').val(""+'00'+value[5]+"");
                            $('#numeroguia').val(""+'0000000001'+"");
                            $('#_producto').append("<option value='"+index[0]+'_'+value[5]+"'>"+value[4]+"</option>");
                            $('#invent').val(""+value[6]+"");
                            console.log(index[0]);
                            // $('#nguia').val(""+'00'+index[0]+'-'+'0000000001'+"");
                        }         
                        else{
                            $('#salida_destino').val(""+value[0]+"");
                            $('#salida_direccion').val(""+value[1]+"");
                            $('#salida_descripcion').val(""+value[2]+"");
                            $('#numeroserie').val(""+'00'+value[6]+"");
                            $('#numeroguia').val(""+'000000000'+(parseInt(value[3].substring(4, 14))+1)+"");
                            $('#_producto').append("<option value='"+index[0]+'_'+value[6]+"'>"+value[5]+"</option>");
                            console.log(index[0]);
                            // $('#nguia').val(""+'00'+index[0]+'-'+'000000000'+(parseInt(value[3].substring(4, 14))+1)+"");
                        }
                    })
                });
            }
        });

        $('#_entrada').on('change', function(){
            var store_id = $(this).val();
            if($.trim(store_id) !=''){
                $.get('/salidas/entrada_almacen', {store_id: store_id}, function(areass){
                    $('#direccion').empty();
                    $('#direccion').append("<input type='text' class='form-control form-control-sm'>");
                    $.each(areass, function(index, value){
                        $('#entrada_destino').val(""+value[0]+"");
                        $('#entrada_direccion').val(""+value[1]+"");
                        $('#entrada_descripcion').val(""+value[2]+"");
                    })
                });
            }
        });

        $('#_identificacion').on('change', function(){
            var identifi_id = $(this).val();
            if($.trim(identifi_id) !=''){
                $.get('/salidas/cliente', {identifi_id: identifi_id}, function(identidad){
                    $('#namecliente').empty();
                    console.log(identifi_id);
                    $('#namecliente').val("<input type='text' class='form-control form-control-sm'>");
                    $.each(identidad, function(index, value){
                        $('#namecliente').val(""+value[0]+"");
                        $('#direccioncliente').val(""+value[1]+"");
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
                        $('#namechofer').val(""+value[0]+"");
                        $('#domi_chofer').val(""+value[1]+"");
                        $('#brevete_plca').val(""+value[2]+'/'+value[3]+"");
                    })
                });
            }
        });
        $('#_tipo').on('change', function(){
            var tipo_id = $(this).val();
            if($.trim(tipo_id) !=''){
                $.get('/producto/filtro/venta', {tipo_id: tipo_id}, function(productoss){
                    $.each(productoss, function(index, value){
                        //$('#invent').val(""+value[1]+"");
                    })
                });
            }
        });

        $('#_producto').on('change', function(){
            datosProducto=document.getElementById('_producto').value.split('_');
            var producto_id = datosProducto[0];
            var ingreso_id = datosProducto[1];
            if($.trim(producto_id) !=''){
                $.get('/salidas/lote', {producto_id: producto_id,ingreso_id: ingreso_id}, function(lotess){
                    $('#_lote').empty();
                    console.log(producto_id);
                    console.log(ingreso_id);
                    $('#_lote').append("<option value=''>Selecciona un Lote</option>");
                    $.each(lotess, function(index, value){
                        $('#_lote').append("<option value='"+value[0]+"_"+value[1]+"_"+value[2]+"'>"+value[0]+"</option>");
                    })
                });
            }
        });
        $('#_lote').on('change', function(){
            datoslote=document.getElementById('_lote').value.split("_");
            var lote_id = datoslote[0];
            var producto_id = datoslote[1];
            var ingreso_id = datoslote[2];
            if($.trim(lote_id) !=''){
                $.get('/salidas/pedido', {lote_id: lote_id,producto_id: producto_id,ingreso_id: ingreso_id}, function(pedidoss){
                    $('#ordenfabricacion').empty();
                    $('#fechavencimiento').empty();
                    console.log(lote_id);
                    $('#ordenfabricacion').val("<input type='text' class='form-control form-control-sm'>");
                    $('#fechavencimiento').val("<input type='date' class='form-control form-control-sm'>");
                    $.each(pedidoss, function(index, value){
                        $('#ordenfabricacion').val(""+value[0]+"");
                        $('#fechavencimiento').val(""+value[1]+"");
                        $('#cantidad2').val(""+value[2]+"");
                        $('#precios').val(""+value[3]+"");
                    })
                });
            }
        });
    });
</script>

<script>
    // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        $('.select2').select2();
    });
</script>

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
        datosProducto=document.getElementById('_producto').value.split('_');
        var producto_id = datosProducto[0];
        idproducto = datosProducto[0];
        producto = $("#_producto option:selected").text();

        datoslote=document.getElementById('_lote').value.split("_");
        var lote_id = datoslote[0];
        lote = lote_id;
        ordenfabricacion = $("#ordenfabricacion").val();
        cantidad = parseInt($("#cantidad").val());
        precio = $("#precios").val();
        peso_total = $("#peso_total").val();
        otra_cantidad = parseInt($("#cantidad2").val());
        fechavencimiento = $("#fechavencimiento").val();
        observaciones = $("#observaciones").val();
        almacen_ids = $("#_store").val();
        console.log(otra_cantidad);
        console.log(cantidad);
        if (producto!="" && lote!="" && ordenfabricacion!="" && peso_total!="" && cantidad>0 && cantidad!="" && otra_cantidad>=cantidad && precio!="") 
        {
            cantidades[cont]=Number(cantidad);
            tproductos = tproductos+cantidades[cont];
            var fila = '<tr class="selected" id="fila'+cont+'"><td class="align-middle fw-light">'+idproducto+'</td><td class="align-middle fw-light"><input type="hidden" name="almacen_id[]" value="'+almacen_ids+'"><input type="hidden" name="producto[]" value="'+idproducto+'">'+producto+'</td><td class="align-middle fw-light"><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><td class="align-middle fw-light"><input type="hidden" name="lote[]" value="'+lote+'">'+lote+'</td><td class="align-middle fw-light"><input type="hidden" name="ordenfabricacion[]" value="'+ordenfabricacion+'">'+ordenfabricacion+'</td><td class="align-middle fw-light"><input type="hidden" name="fechavencimiento[]" value="'+fechavencimiento+'">'+fechavencimiento+'</td><td class="align-middle fw-light"><input type="hidden" name="observaciones[]" value="'+observaciones+'">'+observaciones+'</td><td class="align-middle fw-light"><input type="hidden" name="old_cantidad[]" value="'+otra_cantidad+'"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidades[cont]+'</td><td class="align-middle fw-light"><input type="hidden" name="peso_total[]" value="'+peso_total+'">'+peso_total+'</td><td class="align-middle"><button class="btn btn-sm btn-danger" onclick="eliminar('+cont+');"><i class="bi bi-trash"></i></button></td></tr>';
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
                text: 'Error al ingresar el detalle de la venta, verifique que la cantidad no halla sobrepasado el limite del stock',
                })
        }
    }
    function limpiar()
    {
        $("#_lote").val("");
        $("#ordenfabricacion").val("");
        $("#cantidad").val("");
        $("#peso_total").val("");
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


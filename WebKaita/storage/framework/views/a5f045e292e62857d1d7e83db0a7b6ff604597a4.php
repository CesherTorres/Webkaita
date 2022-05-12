

<?php $__env->startSection('title', 'Nuevo Movimiento'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/form_em.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Encabezado -->
<div class="card mt-5">
    <div class="card-header text-white bg-primary">
        <div class="row justify-content-between">
            <div class="col-lg-7 text-start">
                <h3>Movimiento de Inventario - Central de Kaita</h3>
            </div>
            <div class="col-lg-3 text-end mt-2">
                <h5>05/02/2022 - 12:00:00</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row text-center">
            <div class="col-lg-2 mb-2">
                <label for="direccion">Tipo de Movimiento</label>
                    <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                        <option selected>-- seleccione --</option>
                        <option value="1">Entrada</option>
                        <option value="2">Salida</option>
                    </select>
            </div>
            <div class="col-lg-2 mb-2">
                <label for="direccion">Tipo de Inventario</label>
                    <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                        <option selected>-- seleccione --</option>
                        <option value="1">Producto</option>
                        <option value="2">Materia Prima</option>
                        <option value="3">Activo</option>
                    </select>
            </div>
            <div class="col-lg-3 mb-2">
                <div class="text-start"><label for="n_comprobante">Motivo <span class="text-danger">(Salida)</span></label></div>
                <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                    <option selected>-- seleccione --</option>
                    <option value="1">Venta</option>
                    <option value="2">Traslado de Almacen</option>
                    <option value="3">Obsequio</option>
                    <option value="4">Promociones</option>
                    <option value="5">Bonificaciones</option>
                    <option value="6">Devolucion</option>
                    <option value="6">Mantenimiento</option>
                </select>
            </div>
            <div class="col-lg-2 mb-2">
                <label for="destino">Nro de Operacion</label>
                <input type="text" class="form-control form-control-sm rounded-pill">
            </div>
            <div class="col-lg-3">
                <div class="text-start"><label for="n_comprobante">Motivo <span class="text-danger">(Entrada)</span></label></div>
                <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                    <option selected>-- seleccione --</option>
                    <option value="1">Mantenimiento</option>
                    <option value="2">Inventario</option>
                    <option value="3">Traslado de Almacen</option>
                    <option value="4">Devolucion</option>
                </select>
            </div>
        </div>
        <div class="card mt-3 p-3">
            <div class="row text-center">
            <div class="col-lg-3">
                <label for="direccion">Almacen</label>
                    <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                        <option selected>-- seleccione --</option>
                        <option value="1">Kg.</option>
                        <option value="2">gr.</option>
                        <option value="3">Ltro.</option>
                    </select>
            </div>
            <div class="col-lg-3">
                <label for="destino">Destino</label>
                <input type="email" class="form-control form-control-sm rounded-pill"> 
            </div>
            <div class="col-lg-3">
                <label for="direccion">Direccion</label>
                <input type="email" class="form-control form-control-sm rounded-pill"> 
            </div>
            <div class="col-lg-3">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control rounded-pill"></textarea> 
            </div>
        </div>
        <div class="card mt-3 p-3">
            <div class="text-end mb-2">
                <button class="rounded-pill btn btn-primary text-white"> + Agregar</button>
            </div>
            <div class="row">
                <div class="col-lg-3 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-4 col-lg-4 control-label mt-1 me-2" for="sm">Inventario</label>
                    <div class="col-sm-8 col-lg-8">
                        <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                            <option selected>-- seleccione --</option>
                            <option value="1">Colageno</option>
                            <option value="2">Harina</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-6 control-label mt-1 me-1" for="sm">Lote</label>
                    <div class="col-sm-6">
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-6 control-label mt-1" for="sm">Ord. Fabricacion</label>
                    <div class="col-sm-6">
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-6 control-label mt-1" for="sm">Fecha de Vencimiento</label>
                    <div class="col-sm-6">
                        <input class="rounded-pill form-control form-control-sm" type="date" id="sm">
                    </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-4 control-label mt-1 me-1" for="sm">Id Producto</label>
                    <div class="col-sm-8">
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-6 control-label mt-1 me-1" for="sm">Cantidad</label>
                    <div class="col-sm-6">
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-6 control-label mt-1 me-1" for="sm">Unidad M.</label>
                    <div class="col-sm-6">
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-1">
                    <div class="form-group form-group-sm d-flex">
                    <label class="col-sm-4 control-label mt-1 me-1" for="sm">Observacion</label>
                    <div class="col-sm-8">
                        <textarea class="rounded-pill form-control"></textarea>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2">
            <div class="card-body">
                <h6 class="text-uppercase fw-bold text-center">Lista de Movimientos</h6>
                <table id="tmovimiento" class="table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">N°</th>
                            <th class="h6">Id Producto</th>
                            <th class="h6">Nombre</th>
                            <th class="h6">Tipo</th>
                            <th class="h6">Categoria</th>
                            <th class="h6">U.M</th>
                            <th class="h6">Lote</th>
                            <th class="h6">Fecha. V</th>
                            <th class="h6">Cantidad</th>
                            <th class="h6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class="fw-light align-middle">01</td>
                            <td class="fw-light align-middle">0326324232</td>
                            <td class="fw-light align-middle">Aceite de Coco</td>
                            <td class="fw-light align-middle">producto</td>
                            <td class="fw-light align-middle">Citrico</td>
                            <td class="fw-light align-middle">Unidad</td>
                            <td class="fw-light align-middle">12</td>
                            <td class="fw-light align-middle">12/12/22</td>
                            <td class="fw-light align-middle">245</td>
                            <td class="align-middle">                                        
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                </div>      
                            </td> 
                        </tr>
                            
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-4">
                <div class="row mb-2">
                    <div class="col-lg-12 text-start">
                        <label for="id_cliente" class="text-start">Id Cliente</label>
                        <input type="text" class="form-control form-control-sm rounded-pill">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-12 text-start">
                        <label for="Nombre" class="text-start">Nombre o Razon Social</label>
                        <input type="text" class="form-control form-control-sm rounded-pill">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-12 text-start">
                        <label for="direccion" class="text-start">Direccion</label>
                        <input type="text" class="form-control form-control-sm rounded-pill">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row text-center">
                    <div class="col-lg-4 mb-2">
                        <label for="t_comprobante">Comprobante</label>
                            <select class="form-select form-select-sm rounded-pill" aria-label="Default select example">
                                <option selected>-- seleccione --</option>
                                <option value="1">Factura</option>
                                <option value="2">Boleta</option>
                                <option value="3">Nota de Salida</option>
                            </select>
                            
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="n_comprobante">N° Comprobante</label>
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="row justify-content-between">
                            <div class="col-lg-8 col-8"><label for="n_comprobante">Guia de Remision</label></div>
                            <div class="col-lg-4 col-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                        </div>
                        <input class="rounded-pill form-control form-control-sm" type="text" id="sm">
                    </div>
                    <div class="row">
                    <div class="col-lg-12 text-end mt-3 mb-2">        
                        <label class="h3">Cantidad de Movimiento: <span class="text-danger">980</span><label>
                    </div>
                </div>
                </div>
                <div class="row justify-content-end mt-3">
                    <div class="col-lg-4"> 
                    
                        <button type="button" class="w-100 rounded-pill btn text-white btn-primary mb-1">Guardar</button>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="w-100 rounded-pill btn btn-danger">Cancelar</button>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="/js/form_em.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
                table = $('#tmovimiento').DataTable( {
                responsive: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontró nada, lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "next": "&raquo;",
                        "previous": "&laquo;"
                    } 
                }
            } );
        new $.fn.dataTable.FixedHeader( table );
        } );
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
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/inventario/create.blade.php ENDPATH**/ ?>
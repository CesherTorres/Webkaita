

<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimientos</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg-3">
                <div class="btn-group btn-group-sm w-100" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btningreso" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btningreso">Ingresos</label>
                  
                    <input type="radio" class="btn-check" name="btnradio" id="btnsalida" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnsalida">Salidas</label>
                </div>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item" aria-current="page">Movimientos</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="text-end pb-3">
                <div class="btn-group me-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-dark btn-sm text-white"><i class="bi bi-file-earmark-excel me-2"></i>CSV</button>
                    <button type="button" class="btn btn-dark btn-sm text-white"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</button>
                    <button type="button" class="btn btn-dark btn-sm text-white"><i class="bi bi-printer me-2"></i>IMPRIMIR</button>
                </div>
                <small>
                    <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
                </small>
            </div>
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm pt-2 mb-4" id="">
        <div class="card-body" id="">
            <div class="row pb-2">
                <div class="col-12 col-md-9">
                    <h6 class="text-uppercase fw-bold">Lista de movimiento de ingreso</h6>
                </div>
                <div class="col-12 col-md-3">
                    <a href="<?php echo e(url('ingresos/create')); ?>" class="btn btn-primary btn-sm w-100 align-self-center text-white">
                        <i class="bi bi-plus-circle-fill me-2"></i>
                        Nuevo movimiento ingreso
                    </a>
                </div>
            </div>
            <div class="">
                <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">N°</th>
                            <th class="h6">Ingresó a</th>
                            <th class="h6">Tipo de producto</th>
                            <th class="h6">Motivo de movimiento</th>
                            <th class="h6">Fecha</th>
                            <th class="h6">Cantidad de productos</th>
                            <th class="h6">Guía de remisión</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                            
                    <tbody>
                        <tr>
                            <td class="fw-light align-middle">01</td>
                            <td class="fw-light align-middle">Almacen Principal</td>
                            <td class="fw-light align-middle">Producto Terminado</td>
                            <td class="fw-light align-middle">Inventario</td> 
                            <td class="fw-light align-middle">07/12/2022</td>                          
                            <td class="fw-light align-middle">230</td>        
                            <td class="fw-light align-middle"></td>        
                            <td class="align-middle">                                        
                                <div class="text-center">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary text-white btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Imprimir
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>      
                            </td>
                        </tr>
                    </tbody> 
                </table>  
            </div>    
        </div>
    </div>

    <div class="card border-4 borde-top-primary shadow-sm py-2" id="">
        <div class="card-body" id="">        
            <div class="row pb-2">
                <div class="col-12 col-md-9">
                    <h6 class="text-uppercase fw-bold">Lista de movimiento de salida</h6>
                </div>
                <div class="col-12 col-md-3">
                    <a href="<?php echo e(url('salidas/create')); ?>" class="btn btn-primary btn-sm w-100 align-self-center text-white">
                        <i class="bi bi-plus-circle-fill me-2"></i>
                        Nuevo movimiento salida
                    </a>
                </div>
            </div>
            <div class="">
                <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">N°</th>
                            <th class="h6">Ingresó a</th>
                            <th class="h6">Tipo de producto</th>
                            <th class="h6">Motivo de movimiento</th>
                            <th class="h6">Fecha</th>
                            <th class="h6">Cantidad de productos</th>
                            <th class="h6">Guía de remisión</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                            
                    <tbody>
                        <tr>
                            <td class="fw-light align-middle">01</td>
                            <td class="fw-light align-middle">Almacen Principal</td>
                            <td class="fw-light align-middle">Producto Terminado</td>
                            <td class="fw-light align-middle">Inventario</td> 
                            <td class="fw-light align-middle">07/12/2022</td>                          
                            <td class="fw-light align-middle">230</td>        
                            <td class="fw-light align-middle"></td>        
                            <td class="align-middle">                                        
                                <div class="text-center">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary text-white btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Imprimir
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>      
                            </td>
                        </tr>
                    </tbody> 
                </table> 
            </div>           
        </div>
    </div>
        
       
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('table.display').DataTable( {
            responsive: true,
            fixedHeader: true,
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
    $("#ingresos").show();
    $("#salidas").hide();
    $(document).ready(function() {
        $("#btningreso").click(function () {
            if ($(this).is(":checked")) {
                $("#ingresos").show();
                $("#salidas").hide();
            }
        });
         $("#btnsalida").click(function () {
            if ($(this).is(":checked")) {
                $("#ingresos").hide();
                $("#salidas").show();
            }
        });
    });
</script>

    <!--sweet alert agregar-->
    <?php if(session('addproducto') == 'ok'): ?>
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Éxito!',
            text: 'Nombre de producto registrado correctamente',
            })
        </script>
    <?php endif; ?>

    <!--sweet alert actualizar-->
    <?php if(session('update') == 'ok'): ?>
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Actualizado!',
            text: 'Registro actualizado correctamente',
            })
        </script>
    <?php endif; ?>
        
    <!--sweet alert eliminar-->
    <?php if(session('delete') == 'ok'): ?>
        <script>
        Swal.fire({
            icon: 'success',
            confirmButtonColor: '#07A683',
            title: '¡Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    <?php endif; ?>
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#07A683',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
    <!--.sweet alert eliminar-->
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/movimientos/index.blade.php ENDPATH**/ ?>
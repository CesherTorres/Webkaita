<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>
<h6 class="text-uppercase fw-bold text-center">Lista de movimientos de salida</h6>
<table id="tmovimientossalida" class="table table-hover table-sm py-2" cellspacing="0" style="width:100%">
    <thead class="bg-light">
                <tr>
                    <th class="h6">N° - Movimiento</th>
                    <th class="h6">Movimiento</th>
                    <th class="h6">T. Inventario</th>
                    <th class="h6">Motivo</th>
                    <th class="h6">T. Compro</th>
                    <th class="h6">Cantidad</th>
                    <th class="h6">Fecha y Hora</th>
                    <th class="text-center h6">Accion</th>
                </tr>
            </thead>
            
                <tbody>
                        <tr>
                            <td class="font-weight-light align-middle">032512</td>
                            <td class="font-weight-light align-middle">Entrada</td>
                            <td class="font-weight-light align-middle">Producto </td>
                            <td class="font-weight-light align-middle">Inventario</td> 
                            <td class="font-weight-light align-middle">Movimiento de almacen</td> 
                            <td class="font-weight-light align-middle">230</td>        
                            <td class="font-weight-light align-middle">07/12/2022</td>                          
                            <td class="align-middle">                                        
                                <div class="text-center">
                                    <a class="btn btn-secondary btn-sm text-white" href="#" role="button"><i class="bi bi-journal-check"></i></a>
                                    <a class="btn btn-secondary btn-sm text-white" href="#" role="button"><i class="bi bi-journal-richtext"></i></a>
                                    <a class="btn btn-secondary btn-sm text-white" href="#" role="button"><i class="bi bi-file-post"></i></a>
                                    <a class="btn btn-secondary btn-sm text-white" href="#" role="button"><i class="bi bi-trash"></i></a>
                                </div>      
                            </td>
                        </tr>
                </tbody> 
</table>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
        var table = $('#tmovimientossalida').DataTable( {
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
    
    </script>
<?php $__env->stopSection(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/movimientos/salidas/table.blade.php ENDPATH**/ ?>
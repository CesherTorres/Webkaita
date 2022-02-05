@extends('template.principal')

@section('title', 'Configuration')

@section('css')
<link rel="stylesheet" href="/css/form_em.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
@endsection

@section('content')
<!-- Encabezado -->
<div class="row pb-4">
    <div class="col-lg-9 pt-4">
        <h3 class="text-secondary h2 text-uppercase fw-bold mb-0">Configuracion</h3>
        <p class="text-muted">configuracion de almacen</p>
    </div>
    <!-- <div class="col-lg-3 d-flex">
        <button type="button" class="btn btn-warning w-100 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-file-richtext"></i>
            Nueva Publicacion
        </button>
    </div>
    @ -->
</div>
<!-- fin encabezado -->
    <div class="row justify-content-between">
    <div class="col-4">
        <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="step1-tab" data-toggle="tab"  href="#step1" role="tab" aria-controls="step1" aria-selected="false">Almacenes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="step2-tab" data-toggle="tab"   href="#step2" role="tab" aria-controls="step2" aria-selected="false">Areas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="step3-tab" data-toggle="tab"   href="#step3" role="tab" aria-controls="step3" aria-selected="false">Categorias</a>
            </li>
        </ul>
    </div>
    <div class="col-4 text-end">
        <small>
            <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
        </small>
        <div class="btn-group me-2" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-info btn-sm text-white"><i class="bi bi-file-earmark-excel me-2"></i>CSV</button>
            <button type="button" class="btn btn-info btn-sm text-white"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</button>
            <button type="button" class="btn btn-info btn-sm text-white"><i class="bi bi-printer me-2"></i>IMPRIMIR</button>
        </div>
    </div>
    {{-- <div class="col-4" id="areas">
        <button class="btn-primary">Areas</button>
    </div>
    <div class="col-4" id="categorias">
        <button class="btn-primary">Categorias</button>
    </div> --}}
    </div>
    <form action="" class="needs-validation" novalidate>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                <div class="card border-4 borde-top-primary shadow-sm h-100 py-2 mb-5">
                    <div class="card-body">
                        <table id="treportescontable" class="table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">N°</th>
                                    <th class="h6">Nombre</th>
                                    <th class="h6">Tipo</th>
                                    <th class="h6">Ubigeo</th>
                                    <th class="h6">Descripcion</th>
                                    <th class="text-center h6">Accion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                        <tr>
                                            <td class="font-weight-light align-middle">01</td>
                                            <td class="font-weight-light align-middle">Almacen</td>
                                            <td class="font-weight-light align-middle">Materia Prima</td>
                                            <td class="font-weight-light align-middle">Lima/Lima/Lima </td>
                                            <td class="font-weight-light align-middle">Almacen central de kaita</td>                             
                                            <td class="align-middle">                                        
                                                <div class="text-center">
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-pencil-square"></i></a>
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-trash"></i></a>
                                                </div>      
                                            </td>
                                        </tr>
                                </tbody>  
                        
                            
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                <div class="card border-4 borde-top-primary shadow-sm h-100 py-2 mb-5">
                    <div class="card-body">
                        <table id="treportescontable1" class="table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">N°</th>
                                    <th class="h6">Almacen</th>
                                    <th class="h6">Nombre</th>
                                    <th class="h6">Descripcion</th>
                                    <th class="text-center h6">Accion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                        <tr>
                                            <td class="font-weight-light align-middle">01</td>
                                            <td class="font-weight-light align-middle">Almacen 1</td>
                                            <td class="font-weight-light align-middle">Citricos</td>
                                            <td class="font-weight-light align-middle">Area de Citricos de produccion</td>                               
                                            <td class="align-middle">                                        
                                                <div class="text-center">
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-pencil-square"></i></a>
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-trash"></i></a>
                                                </div>      
                                            </td>
                                        </tr>
                                </tbody>  
                        
                            
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step2-tab">
                <div class="card border-4 borde-top-primary shadow-sm h-100 py-2 mb-5">
                    <div class="card-body">
                        <table id="treportescontable2" class="table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">N°</th>
                                    <th class="h6">Nombre</th>
                                    <th class="h6">Tipo</th>
                                    <th class="h6">Descripcion</th>
                                    <th class="text-center h6">Accion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                        <tr>
                                            <td class="font-weight-light align-middle">01</td>
                                            <td class="font-weight-light align-middle">Embasados</td>
                                            <td class="font-weight-light align-middle">Materia prima</td>
                                            <td class="font-weight-light align-middle">Embases de materia prima</td>                               
                                            <td class="align-middle">                                        
                                                <div class="text-center">
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-pencil-square"></i></a>
                                                    <a class="btn btn-warning btn-sm text-white" href="#" role="button"><i class="bi bi-trash"></i></a>
                                                </div>      
                                            </td>
                                        </tr>
                                </tbody>  
                        
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
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
                table = $('#treportescontable').DataTable( {
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
        $(document).ready(function() {
                table = $('#treportescontable1').DataTable( {
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
        $(document).ready(function() {
                table = $('#treportescontable2').DataTable( {
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
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();
    </script>
@endsection
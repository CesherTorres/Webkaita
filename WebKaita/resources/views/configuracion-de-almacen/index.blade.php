@extends('templates.templateDashboard')

@section('title', 'Configuración')

@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Configuración de almacén</h1>
                    <p class="text-muted">Configura los principales atributos de almacén, productos y movimientos.</p>
                </div>
                <div class="col-lg-3 d-flex">
                    {{-- <button class="btn btn-secondary w-100 align-self-center text-white" id="downloadPdf">
                        <i class="bi bi-download me-2"></i>
                        Descargar Reporte
                    </button> --}}
                </div>
            </div>
        <!-- fin encabezado -->

        {{-- breacrumb --}}
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacén</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuración de almacén</li>
                </ol>
            </div>
        {{-- fin breacrumb --}}

        <div class="row mb-5">
            <div class="col-12 col-md-3 py-2 py-md-0">
                <div class="card border-4 borde-bottom-primary shadow-sm h-100">
                    <div class="card-header bg-primary text-center text-white fw-bold">
                        Almacén
                    </div>
                    <div class="card-body pb-0">
                        <span class="fw-light">Registra nuevos almacenes y asignales las areas que le correspondan.</span>
                        <ul class="list-unstyled pt-2">
                            <li class="text-primary">
                                <i class="bi bi-box2 me-2"></i>
                                <a href="{{url('almacen')}}" class="text-decoration-none">Almacenes</a>
                            </li>
                            <li class="text-primary py-2">
                                <i class="bi bi-boxes me-2"></i>
                                <a href="{{url('areas')}}" class="text-decoration-none">Áreas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 py-2 py-md-0">
                <div class="card border-4 borde-bottom-primary shadow-sm h-100">
                    <div class="card-header bg-primary text-center text-white fw-bold">
                        Productos
                    </div>
                    <div class="card-body pb-0">
                        <span class="fw-light">Registra nuevos atributos para luego utilizarlos en la creacion de  nombres de productos.</span>
                        <ul class="list-unstyled pt-2">
                            <li class="text-primary">
                                <i class="bi bi-grid-1x2-fill me-2"></i>
                                <a href="{{url('tipos')}}" class="text-decoration-none">Tipos</a>
                            </li>
                            <li class="text-primary py-2">
                                <i class="bi bi-diagram-2-fill me-2"></i>
                                <a href="{{url('categorias')}}" class="text-decoration-none">Categorías</a>
                            </li>
                            <li class="text-primary">
                                <i class="bi bi-stickies-fill me-2"></i>
                                <a href="{{url('marcas')}}" class="text-decoration-none">Marcas</a>
                            </li>
                            <li class="text-primary py-2">
                                <i class="bi bi-rulers me-2"></i>
                                <a href="{{url('medidas')}}" class="text-decoration-none">Medidas</a>
                            </li>
                            <li class="text-primary ">
                                <i class="bi bi-tags-fill me-2"></i>
                                <a href="{{url('etiquetas')}}" class="text-decoration-none">Etiquetas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 py-2 py-md-0">
                <div class="card border-4 borde-bottom-primary shadow-sm h-100">
                    <div class="card-header bg-primary text-center text-white fw-bold">
                        Movimientos
                    </div>
                    <div class="card-body pb-0">
                        <span class="fw-light">Importante. Registrar motivos para movimientos de ingresos y salidas de almacén.</span>
                        <ul class="list-unstyled pt-2">
                            <li class="text-primary">
                                <i class="bi bi-record-circle-fill me-2"></i>
                                <a href="{{url('motivos')}}" class="text-decoration-none">Motivos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


       

    <!--Fin principal -->
@endsection

@section('js')
    
@endsection

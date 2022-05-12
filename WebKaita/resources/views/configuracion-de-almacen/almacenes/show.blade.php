@extends('templates.templateDashboard')

@section('title', 'Almacenes')

@section('content')
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Almacenes</h1>
                <p class="text-muted">Visualizar detalles del almacén.</p>
            </div>
        </div>
    <!-- fin encabezado -->
 
    {{-- breacrumb --}}
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('configuracion-de-almacen')}}">Configuración de almacén</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('almacen')}}">Almacenes</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{$almacen->name}}</li>
                </ol>
            </div>
        </div>
    </div>
    {{-- fin breacrumb --}}

    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm mt-2 mb-5">
        <div class="row g-0">
            <div class="col-md-8">
                <img class="rounded img-fluid" src="/images/planos/{{$almacen->plano}}" />
                <div class="card-img-overlay">
                    <span class="badge bg-light text-dark float-start">Fecha de registro: {{$almacen->fecha}}</span>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="">
                        <label class="form-label">Nombre</label>
                        <p class="fw-light ">{{$almacen->name}}</p>
                    </div>
                    <div class="">
                        <label class="form-label">Dirección</label>
                        <p class="fw-light ">{{$almacen->direccion}}</p>
                    </div>
                    <div class="">
                        <label class="form-label">Referencia</label>
                        <p class="fw-light ">{{$almacen->referencia}}</p>
                    </div>
                    <div class="">
                        <label class="form-label">Distrito/Provincia/Departamento</label>
                        <p class="fw-light ">{{$almacen->ubigeo->distrito.'/'.$almacen->ubigeo->provincia.'/'.$almacen->ubigeo->departamento}}</p>
                    </div>
                    <div class="">
                        <label class="form-label">Descripción</label>
                        <p class="fw-light ">{{$almacen->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    {{-- Fin contenido --}}   
    
    
@endsection


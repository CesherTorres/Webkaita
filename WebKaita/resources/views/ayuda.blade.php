@extends('templates.templateDashboard')

@section('title', 'Ayuda')

@section('content')
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Ayuda</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <a href="{{url('productos/create')}}" class="btn btn-primary w-100 align-self-center text-white">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Nuevo producto
                </a> --}}
            </div>
        </div>
    <!-- fin encabezado -->
 

    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm py-2">
        <div class="card-body">
            
        </div>
    </div>
        
    {{-- Fin contenido --}}   
    
@endsection

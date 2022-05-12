@extends('templates.templateDashboard')

@section('title', 'Inventario')

@section('content')
    
    <!-- Encabezado -->
        <div class="row justify-content-between pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Inventario</h1>
                <p class="text-muted">Se muestra la lista de productos que pertenecen al inventario del {{$store->name}}.</p>
            </div>
            <div class="col-lg-3 text-center">
               <div class="card borde-right-primary border-4 shadow-sm">
                   <div class="card-body px-0 py-1">
                    @foreach($inv as $i)
                        <h3 class="fw-bold text-primary">{{$i->total}}</h3>
                        <span>Productos</span>
                    @endforeach
                   </div>
               </div>
            </div>
        </div>
    <!-- fin encabezado -->
 
    {{-- breacrumb --}}
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="pt-3 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{url('inventario')}}">Inventario</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{$store->name}}</li>
                </ol>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="text-end pb-3">
                <div class="btn-group me-2" role="group" aria-label="Basic example">
                    <a href="{{url('inventario/export/reporte-excel', $store)}}" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-excel me-2"></i>CSV</a>
                    <a href="{{route('print-inventario.pdf', $store)}}" target="bank" class="btn btn-dark border-white btn-sm px-4"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</a>
                </div>
                <small>
                    <button type="button" class="btn btn-sm btn-outline-dark rounded-circle" data-bs-toggle="popover" title="Obtener Reportes" data-bs-content="Para obtener reportes solo necesitas hacer click en cualquier botón que se muestra al lado izquierdo. Se puede descargar en formato CSV, PDF ó imprimir directamente."><i class="bi bi-question-lg"></i></button>
                </small>
            </div>
        </div>
    </div>
    {{-- fin breacrumb --}}

    {{-- Contenido --}}
    <div class="card border-4 borde-top-primary shadow-sm my-2  mb-5">
        <div class="card-body">
            <div class="row pb-2">
                <div class="col-12 col-md-8">
                    <h6 class="text-uppercase fw-bold">Inventario del {{$store->name}}</h6>
                </div>
            </div>

            <div class="">
                <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Código</th>
                            <th class="h6">Producto</th>
                            <th class="h6">Tipo de producto</th>
                            <th class="h6">Areas</th>
                            <th class="h6">Unidad M.</th>
                            <th class="h6">Lote</th>
                            <th class="h6">F. Vencimiento</th>
                            <th class="h6">Cantidad</th>
            
                        </tr>
                    </thead>
                            
                    <tbody> 
                        @foreach($inventario as $item) 
                            <tr>
                                <td class="fw-light align-middle">{{$item->codigo}}</td>
                                <td class="fw-light align-middle">{{$item->name}}</td>
                                <td class="fw-light align-middle">{{$item->tipo}}</td>
                                <td class="fw-light align-middle">{{$item->area_destino}}</td>
                                <td class="fw-light align-middle">{{$item->medida}}</td>                          
                                <td class="fw-light align-middle">{{$item->lote}}</td>        
                                <td class="fw-light align-middle">{{$item->fecha_vencimiento}}</td>        
                                <td class="fw-light align-middle">{{$item->cantidad}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody> 
                </table>  
            </div>    
        </div>
    </div>

    {{-- Fin contenido --}}   
    
@endsection


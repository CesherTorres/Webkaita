@extends('templates.templateDashboard')

@section('title', 'Bienvenido')

@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5 pb-3">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> ¡Bienvenidos!</h1>
                    <p class="lead text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    {{-- <button class="btn btn-secondary w-100 align-self-center text-white" id="downloadPdf">
                        <i class="bi bi-download me-2"></i>
                        Descargar Reporte
                    </button> --}}
                </div>
            </div>
        <!-- fin encabezado -->
{{-- 
            <!-- card-info -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h6 fw-light text-muted text-uppercase">Ingresos</div>
                                    <div class="h3 mb-0 fw-bold text-primary">S/. 40,000</div>
                                    <a href="#" class="text-decoration-none">
                                        <small class="text-muted"> <i class="bi bi-info-circle me-2 "></i> Información</small>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-basket3-fill h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h6 fw-light text-muted text-uppercase">Egresos</div>
                                    <div class="h3 mb-0 fw-bold text-primary">S/. 40,000</div>
                                    <a href="#" class="text-decoration-none">
                                        <small class="text-muted"> <i class="bi bi-info-circle me-2 "></i> Información</small>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-cash h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h6 fw-light text-muted text-uppercase">Productos</div>
                                    <div class="h3 mb-0 fw-bold text-primary">400</div>
                                    <a href="#" class="text-decoration-none">
                                        <small class="text-muted"> <i class="bi bi-info-circle me-2 "></i> Información</small>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-minecart-loaded h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-4 borde-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h6 fw-light text-muted text-uppercase">Clientes</div>
                                    <div class="h3 mb-0 fw-bold text-primary">40</div>
                                    <a href="#" class="text-decoration-none">
                                        <small class="text-muted"> <i class="bi bi-info-circle me-2 "></i> Información</small>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill h1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin card-info -->

            <!-- chart -->
            <div class="row pb-5">
                <div class="col-12 col-md-6 my-2">
                    <div class="card border-4 borde-top-secondary shadow-sm h-100 py-2">
                        <div class="card-header bg-white">
                            <span>Chart1</span>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-2">
                    <div class="card border-4 borde-top-primary shadow-sm h-100 py-2">
                        <div class="card-header bg-white">
                            <span>Chart2</span>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin chart  --> --}}
    <!--Fin principal -->
@endsection

@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 8, 20],
                    backgroundColor: [
                        '#768070',
                        '#768070',
                        '#768070',
                        '#768070',
                        '#768070',
                        '#768070',
                        '#768070',
                        '#768070'
                    ],
                    maxBarThickness:30,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        <script>
            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx, {
                type: 'line',
                data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 8, 20],
                    backgroundColor: [
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3',
                        '#78C4C3'
                    ],
                    maxBarThickness:30,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
            });
    </script>
@endsection

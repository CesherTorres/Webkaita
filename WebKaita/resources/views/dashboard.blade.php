@extends('templates.templateDashboard')

@section('title', 'Bienvenido')

@section('css')
<a href="https://iconscout.com/lotties/packaging-for-delivery" hidden target="_blank">Packaging For Delivery Lottie Animation</a> by <a href="https://iconscout.com/contributors/luciyamaji" target="_blank">Luci/Yamaji</a>
<style>
    #image3d{
     animation:  move_img 6s ease-in-out infinite;
    }
    @keyframes move_img{
     0%{
         transform: translateY(10px);
     }
     25%{
         transform: translateY(-10px);
     }
     100%{
         transform: translateY(10px);
     }
 }
 }
</style>
@endsection

@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-4 pb-2">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> ¡Bienvenido!</h1>
                    <p class="text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    {{-- <button class="btn btn-secondary w-100 align-self-center text-white" id="downloadPdf">
                        <i class="bi bi-download me-2"></i>
                        Descargar Reporte
                    </button> --}}
                </div>
            </div>
        <!-- fin encabezado -->

        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="container text-center">
                <h4 class="text-secondary fw-bold">Esta sección será integrada en una nueva versión</h4>
                <img src="/images/dashboard kaita 2.png" class="img-fluid" style="width: 550px;" id="image3d" alt="">
                <div class="text-center">
                    <a href="{{url('configuracion-de-almacen')}}" class="btn btn-primary fw-bold text-white">Ir a configuración de almacén</a>
                </div> 
            </div>
        </div> 


{{-- 
            <!-- card-info -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <div class="card border-0 shadow-sm h-100 py-2">
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
                    <div class="card border-0 shadow-sm h-100 py-2">
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
                    <div class="card border-0 shadow-sm h-100 py-2">
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
                    <div class="card border-0 shadow-sm h-100 py-2">
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
                    <div class="card border-0 shadow-sm h-100 py-2">
                        <div class="card-header bg-white">
                            <span>Chart1</span>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-2">
                    <div class="card border-0 shadow-sm h-100 py-2">
                        <div class="card-header bg-white">
                            <span>Chart2</span>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin chart  -->  --}}
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
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A'
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
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A',
                        '#76B82A'
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

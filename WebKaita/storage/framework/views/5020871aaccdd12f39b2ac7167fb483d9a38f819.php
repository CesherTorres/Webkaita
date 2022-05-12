<?php $__env->startSection('title', 'Bienvenido'); ?>

<?php $__env->startSection('content'); ?>
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5 pb-3">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> ¡Bienvenido!</h1>
                    <p class="lead text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    
                </div>
            </div>
        <!-- fin encabezado -->

    <!--Fin principal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Desktop\projectKaita\resources\views/welcome.blade.php ENDPATH**/ ?>
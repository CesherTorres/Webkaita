

<?php $__env->startSection('title', 'Bienvenido'); ?>

<?php $__env->startSection('css'); ?>
<a href="https://iconscout.com/lotties/packaging-for-delivery" hidden target="_blank">Packaging For Delivery Lottie Animation</a> by <a href="https://iconscout.com/contributors/luciyamaji" target="_blank">Luci/Yamaji</a>
<style>
    #image3d{
     animation:  move_img 6s ease-in-out infinite;
    }
    @keyframes  move_img{
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-4 pb-2">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> ¡Bienvenido!</h1>
                    <p class="text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    
                </div>
            </div>
        <!-- fin encabezado -->

        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="container text-center">
                <h4 class="text-secondary fw-bold">Esta sección será integrada en una nueva versión</h4>
                <img src="/images/dashboard kaita 2.png" class="img-fluid" style="width: 550px;" id="image3d" alt="">
                <div class="text-center">
                    <a href="<?php echo e(url('configuracion-de-almacen')); ?>" class="btn btn-primary fw-bold text-white">Ir a configuración de almacén</a>
                </div> 
            </div>
        </div> 



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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/dashboard.blade.php ENDPATH**/ ?>
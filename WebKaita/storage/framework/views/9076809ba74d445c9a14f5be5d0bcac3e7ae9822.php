<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Inventario de almacén PDF - <?php echo e($store->name); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(public_path('/css/templategeneral.css')); ?>" type="text/css">
    
</head>
<style>
    @font-face {
      font-family: 'Cairo';
      font-style: normal;
      font-weight: 300;
      src: local('Cairo'),  url(https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap) format('truetype');
    }

    @page  {
        margin: 0cm 0cm;
    }
    body{
        font-family: 'Cairo', sans-serif !important;
        margin-top: 1.5cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
        margin-bottom: 1.5cm;
    }

    header {
        font-family: Cairo, sans-serif !important;
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1.5cm;
        background-color: #76B82A;
        color: white;
    }

    footer {
        font-family: Cairo, sans-serif !important;
        position: fixed; 
        bottom: 0.2cm; 
        left: 0cm; 
        right: 0cm;
        height: 2cm;
    }
    .bg-primary{
        background-color: #76B82A !important;
    }

    .text-primary{
        color: #76B82A !important;
    }

    .bg-secondary{
        background-color: #999999 !important;
    }

    .border-primary{
        border-color: #76B82A !important;
    }


</style>
<body>
    <header>
        <div class="container">
            <div class="clearfix">
                <div class="float-start">
                    <span class="text-uppercase fs-6 fw-bold align-middle"><img src="<?php echo e(public_path('images/KAITA 3.png')); ?>" class="mt-1 shadow" style="height:85px" alt="..."> KAITA INTERNATIONAL S.A.C</span>
                </div>
                <div class="float-end">
                    <span class="text-uppercase fs-6 float-end fw-bold pt-4"><?php echo e($now->format('Y-m-d')); ?></span>
                </div>
               
                
            </div>
        </div>
    </header>
    <div class="">
        
        <span class="text-uppercase fs-5 pt-3 text-center fw-bold d-block">Reporte de inventario - <?php echo e($store->name); ?></span>
        <br>
        <span class="pt-3 fw-normal text-uppercase d-block border-primary border-bottom" style="font-size: 13px">Datos del almacén:</span>
        
        <table class="w-100 py-2" style="font-size: 13px">
            <tr>
                <td>
                    <div class="clearfix">
                        <span class="fw-bold">Almacén:</span>
                        <span class="fw-normal float-end"><?php echo e($store->name); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold">Distrito/Provincia/Departamento:</span>
                        <span class="fw-normal float-end"><?php echo e($store->ubigeo->distrito.'/'.$store->ubigeo->provincia.'/'.$store->ubigeo->departamento); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold">Dirección:</span>
                        <span class="fw-normal float-end"><?php echo e($store->direccion); ?></span>
                    </div>
                    <div class="clearfix">
                        <span class="fw-bold">Referencia:</span>
                        <span class="fw-normal float-end"><?php echo e($store->referencia); ?></span>
                    </div>
                </td>
            </tr>
        </table>
        <span class=" fw-bold d-block" style="font-size: 13px">Áreas: </span>
        <?php $__currentLoopData = $store->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge bg-secondary me-2 mt-2"><?php echo e($area->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <br>
        <span class="pt-3 fw-normal text-uppercase d-block border-primary border-bottom" style="font-size: 13px">Inventario:</span>

        <table class="w-100 pt-3" style="font-size: 10px;">
            <thead class="bg-secondary text-white">
                <tr>
                    <th  class="border-0 py-2 border-secondary text-center">Código</th>
                    <th  class="border-0 py-2 border-secondary text-center">Producto</th>
                    <th  class="border-0 py-2 border-secondary text-center">Tipo de producto</th>
                    <th  class="border-0 py-2 border-secondary text-center">Categoría</th>
                    <th  class="border-0 py-2 border-secondary text-center">Unidad M.</th>
                    <th  class="border-0 py-2 border-secondary text-center">Lote</th>
                    <th  class="border-0 py-2 border-secondary text-center">F. Vencimiento</th>
                    <th  class="border-0 py-2 border-secondary text-center">Cantidad</th>

                </tr>
            </thead>
                <tbody>
                    <?php $__currentLoopData = $inventario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->codigo); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->name); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->tipo); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->categoria); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->medida); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->lote); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->fecha_vencimiento); ?></td>
                            <td class="border-bottom py-2 border-secondary text-center"><?php echo e($item->cantidad); ?></td>
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
        </table>

        <table class="w-100 py-3" style="font-size: 13px;">
            <tbody>
                <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr> 
                        <td style="width: 60%"></td>
                        <td class="" style="width: 40%">
                            <div class="clearfix">
                                <span>Total de productos:</span>
                                <span class="float-end"><?php echo e($i->total); ?></span>
                            </div>
                            
                        </td>
                    </tr>
                    <tr> 
                        <td style="width: 60%"></td>
                        <td class="" style="width: 40%">
                            <div class="clearfix">
                                <span>Cantidad total de productos:</span>
                                <span class="float-end"><?php echo e($i->cantidadtotal); ?></span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>    

        
    </div>
    <br>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Cairo, sans-serif", "normal");
                $pdf->text(270, 820, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>
</body>
</html><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/reportes/almacen/inventario-reportePdf.blade.php ENDPATH**/ ?>
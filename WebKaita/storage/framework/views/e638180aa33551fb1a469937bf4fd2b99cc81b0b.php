<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Movimiento PDF - <?php echo e($salida->codigo); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(public_path('/css/templategeneral.css')); ?>" type="text/css">
    
</head>
<style>
    @font-face {
      font-family: 'Cairo';
      font-style: normal;
      font-weight: 300;
      src: local('Cairo'), local('Cairo'), url(https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap) format('truetype');
    }
    body{
        font-family: Cairo, sans-serif !important;
        
    }
    .bg-primary{
        background-color: #76B82A !important;
    }

    .border-primary{
        border-color: #76B82A !important;
    }


</style>
<body>
    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                <img src="<?php echo e(public_path('images/KAITACORPORATIVO2.png')); ?>" class=" card-img" style="height:85px" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">KAITA INTERNATIONAL S.A.C</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin - Sector Segundo Lima - Lima - Villa Maria Del Triunfo</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">968370868 - 945949674</span>
            </td>
            <td style="width: 35%">
                <div class="card text-center border border-primary">
                    <span class="text-uppercase py-1 fw-bold ">R.U.C. 20608321773</span>
                    <div class="bg-primary float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Movimiento de Almac??n</span>
                    </div>
                    <span class="text-uppercase py-1">N??.- <?php echo e($salida->codigo); ?></span>
                </div>
            </td>
        </tr>
    </table>
    <table class="w-100 border py-3" style="font-size: 13px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">RESPONSABLE:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->almacenero->user->persona->name); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">FECHA:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->fecha); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">ORIGEN:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->store->name); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">DESTINO:</span>
                    <span class="fw-normal"><?php echo e($salida->destino_store); ?></span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">TIPO DE PRODUCTO:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->tipo->name); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">GU??A DE REMISI??N:</span>
                    <span class="fw-normal float-end">N?? <?php echo e($salida->nro_serie_guia.' - '.$salida->nguia); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">TIPO MOVIMIENTO:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->motivo->tipo_motivo); ?></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">MOTIVO:</span>
                    <span class="fw-normal float-end"><?php echo e($salida->motivo->name); ?></span>
                </div>
            </td>
        </tr>
        
    </table>
    <table class="w-100" style="font-size: 13px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">C??DIGO</th>
                <th class="border" style="width: 50%">DESCRIPCI??N</th>
                <th class="border" style="width: 10%">UND. M.</th>
                <th class="border" style="width: 10%">LOTE</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">P. UNIT.</th>
                <th class="border" style="width: 10%">TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            <?php $__currentLoopData = $detallesalida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr> 
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->codigo); ?></td>
                    <td class=" align-top border-start" style="width: 50%"><?php echo e($item->name); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->medida); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->lote); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->cantidad); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->precio); ?></td>
                    <td class=" align-top border-start border-end" style="width: 10%"><?php echo e($item->cantidad*$item->precio); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class=" align-top border-start" style="height: 200px"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start border-end"></td>

            </tr>
        </tbody>
        
    </table>
    
    <?php $__currentLoopData = $dt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
    <table class="w-100" style="font-size: 13px;">
        <tbody>
            <tr> 
                <td class="border text-uppercase" style="width: 100%">Son: <?php echo e($formatter->toInvoice($i->total, 2, 'soles')); ?></td>
            </tr>
        </tbody>
    </table>
    <table class="w-100 py-3" style="font-size: 13px;">
        <tbody>
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">OPERACIONES GRAVADAS:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end"><?php echo e($i->total); ?></span>
                    </div>
                    
                </td>
            </tr>
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">I.G.V.:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end"><?php echo e(($i->total)*0.18); ?></span>
                    </div>
                </td>
            </tr>
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">TOTAL A PAGAR:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end"><?php echo e(($i->total)+(($i->total)*0.18)); ?></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/reportes/almacen/movimientos/movimiento_salida_pdf.blade.php ENDPATH**/ ?>
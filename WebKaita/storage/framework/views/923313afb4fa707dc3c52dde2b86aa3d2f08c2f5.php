<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Movimiento PDF - <?php echo e($ingreso->codigo); ?></title>
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
        background-image: url(<?php echo e(public_path('images/kaita-marca-de-agua.png')); ?>);
        background-size: 70% 20%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        
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
                    <div class="py-1">
                        <span class="text-uppercase my-3 fw-bold ">R.U.C. 10758502975</span>
                    </div>
                    <div class="bg-primary py-1 float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Guía de remisión - Remitente</span>
                    </div>
                    <div class="py-1">
                        <span class="text-uppercase my-3">0001 - <span class="text-red fw-bold lead">N° 0000456</span></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w-100 py-2" style="font-size: 13px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Sr.(es):</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Dirección:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">R.U.C:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                    <span class="fw-normal"></span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">Punto de partida:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Punto de llegada:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Fecha de emision:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Motivo de traslado: </span>
                    <span class="fw-normal float-end"></span>
                </div>
            </td>
        </tr>
        
    </table>

    <span class="text-uppercase fw-bold d-block pt-2" style="font-size: 10px">datos del transportista</span>
    <table class="w-100 border pb-2" style="font-size: 13px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Nombre:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">R.U.C.:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Brevete:</span>
                    <span class="fw-normal float-end"></span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Domicilio:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">D.N.I.:</span>
                    <span class="fw-normal float-end"></span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Placa:</span>
                    <span class="fw-normal float-end"></span>
                </div>
            </td>
            
        </tr>
        
    </table>

    <table class="w-100" style="font-size: 13px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">CÓDIGO</th>
                <th class="border" style="width: 50%">DESCRIPCIÓN</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">UNIDAD MEDIDA</th>

                <th class="border" style="width: 10%">PESO TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            <?php $__currentLoopData = $inventario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr> 
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->codigo); ?></td>
                    <td class=" align-top border-start" style="width: 50%"><?php echo e($item->name); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->cantidad); ?></td>
                    <td class=" align-top border-start" style="width: 10%"><?php echo e($item->medida); ?></td>
                    <td class=" align-top border-start border-end" style="width: 10%"><?php echo e($item->cantidad*$item->precio); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class=" align-top border-start" style="height: 200px"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                
                <td class=" align-top border-start border-end"></td>

            </tr>
        </tbody>
        
    </table>
    
</body>
</html><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/reportes/almacen/movimientos/guia_ingreso_pdf.blade.php ENDPATH**/ ?>
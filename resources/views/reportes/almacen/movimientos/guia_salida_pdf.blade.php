<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Movimiento PDF - {{$salida->codigo}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('/css/templategeneral.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ public_path('/css/main.css') }}" type="text/css"> --}}
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
        background-image: url({{ public_path('images/kaita-marca-de-agua.png') }});
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

    .page-break {
	    page-break-after: always;
	}

    .pie {
        font-family: Cairo, sans-serif !important;
        position: absolute; 
        bottom: 0.2cm; 
        left: 0cm; 
        right: 0cm;
        height: 0.2cm;
    }

    .text-blue{
        color: #2248C3;
        font-family: 'Source Code Pro', monospace !important;
    }

</style>
<body>
    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                <img src="{{ public_path('images/KAITACORPORATIVO2.png') }}" class=" card-img" style="height:85px" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">KAITA INTERNATIONAL S.A.C</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin - Sector Segundo Lima - Lima - Villa Maria Del Triunfo</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">968370868 - 945949674</span>
            </td>
            <td style="width: 35%">
                <div class="card text-center border border-primary">
                    <div class="py-1">
                        <span class="text-uppercase my-3 fw-bold ">R.U.C. 20608321773</span>
                    </div>
                    <div class="bg-primary py-1 float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Guía de remisión - Remitente</span>
                    </div>
                    <div class="py-1">
                        <span class="text-uppercase my-3">{{$salida->nro_serie_guia}} - <span class="text-red fw-bold lead">N° {{$salida->nguia}}</span></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w-100 py-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Sr.(es):</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Dirección:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->identificacion.' - '.$salida->cliente->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->tipo_comprobante.' - '.$salida->nro_comprobante}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">Punto de partida:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->store->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Punto de llegada:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->destino_store}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Fecha de emision:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->fecha}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Motivo: </span>
                    <span class="fw-normal text-blue float-end">{{$salida->motivo->name}}</span>
                </div>
            </td>
        </tr>
        
    </table>

    <span class="text-uppercase border-top border-primary fw-bold d-block pt-2" style="font-size: 12px">datos del transportista</span>
    <table class="w-100 pb-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Nombre:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->name}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Brevete:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->brevete}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Domicilio:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Nro. Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Placa:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->placa}}</span>
                </div>
            </td>
            
        </tr>
        
    </table>

    <table class="w-100" style="font-size: 10px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">CÓDIGO</th>
                <th class="border" style="width: 40%">DESCRIPCIÓN</th>
                <th class="border" style="width: 10%">ORDEN FAB.</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">UNIDAD MEDIDA</th>
                <th class="border" style="width: 10%">PESO TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            @foreach($detallesalida as $item)
                <tr> 
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->codigo}}</td>
                    <td class=" align-top text-blue border-start" style="width: 40%">{{$item->name}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->orden_fabricacion}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->cantidad}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->medida}}</td>
                    <td class=" align-top text-blue border-start border-end" style="width: 10%">{{$item->peso_total}}</td>
                </tr>
            @endforeach
            
            <tr>
                <td class=" align-top border-start border-bottom" style="height: 100px"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom border-end"></td>

            </tr>
        </tbody>
        
    </table>

    <div class="pie">
        <table class="w-100">
            <tbody>
                <tr>
                    <td style="width: 36%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">V°B°</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">Recibí Conforme</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        
                            <p class="text-end text-uppercase text-danger">Remitente</p>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- guia sunat --}}
    <div class="page-break"></div>

    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                <img src="{{ public_path('images/KAITACORPORATIVO2.png') }}" class=" card-img" style="height:85px" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">KAITA INTERNATIONAL S.A.C</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin - Sector Segundo Lima - Lima - Villa Maria Del Triunfo</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">968370868 - 945949674</span>
            </td>
            <td style="width: 35%">
                <div class="card text-center border border-primary">
                    <div class="py-1">
                        <span class="text-uppercase my-3 fw-bold ">R.U.C. 20608321773</span>
                    </div>
                    <div class="bg-primary py-1 float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Guía de remisión - Remitente</span>
                    </div>
                    <div class="py-1">
                        <span class="text-uppercase my-3">{{$salida->nro_serie_guia}} - <span class="text-red fw-bold lead">N° {{$salida->nguia}}</span></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w-100 py-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Sr.(es):</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Dirección:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->identificacion.' - '.$salida->cliente->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->tipo_comprobante.' - '.$salida->nro_comprobante}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">Punto de partida:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->store->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Punto de llegada:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->destino_store}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Fecha de emision:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->fecha}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Motivo: </span>
                    <span class="fw-normal text-blue float-end">{{$salida->motivo->name}}</span>
                </div>
            </td>
        </tr>
        
    </table>

    <span class="text-uppercase border-top border-primary fw-bold d-block pt-2" style="font-size: 12px">datos del transportista</span>
    <table class="w-100 pb-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Nombre:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->name}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Brevete:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->brevete}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Domicilio:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Nro. Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Placa:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->placa}}</span>
                </div>
            </td>
            
        </tr>
        
    </table>

    <table class="w-100" style="font-size: 10px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">CÓDIGO</th>
                <th class="border" style="width: 40%">DESCRIPCIÓN</th>
                <th class="border" style="width: 10%">ORDEN FAB.</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">UNIDAD MEDIDA</th>
                <th class="border" style="width: 10%">PESO TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            @foreach($detallesalida as $item)
                <tr> 
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->codigo}}</td>
                    <td class=" align-top text-blue border-start" style="width: 40%">{{$item->name}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->orden_fabricacion}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->cantidad}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->medida}}</td>
                    <td class=" align-top text-blue border-start border-end" style="width: 10%">{{$item->peso_total}}</td>
                </tr>
            @endforeach
            
            <tr>
                <td class=" align-top border-start border-bottom" style="height: 100px"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom border-end"></td>

            </tr>
        </tbody>
        
    </table>

    <div class="pie">
        <table class="w-100">
            <tbody>
                <tr>
                    <td style="width: 36%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">V°B°</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">Recibí Conforme</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <p class="text-end text-uppercase text-danger">Sunat</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    {{-- guia control adm --}}
    <div class="page-break"></div>

    
    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                <img src="{{ public_path('images/KAITACORPORATIVO2.png') }}" class=" card-img" style="height:85px" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">KAITA INTERNATIONAL S.A.C</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin - Sector Segundo Lima - Lima - Villa Maria Del Triunfo</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">968370868 - 945949674</span>
            </td>
            <td style="width: 35%">
                <div class="card text-center border border-primary">
                    <div class="py-1">
                        <span class="text-uppercase my-3 fw-bold ">R.U.C. 20608321773</span>
                    </div>
                    <div class="bg-primary py-1 float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Guía de remisión - Remitente</span>
                    </div>
                    <div class="py-1">
                        <span class="text-uppercase my-3">{{$salida->nro_serie_guia}} - <span class="text-red fw-bold lead">N° {{$salida->nguia}}</span></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w-100 py-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Sr.(es):</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Dirección:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->identificacion.' - '.$salida->cliente->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->tipo_comprobante.' - '.$salida->nro_comprobante}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">Punto de partida:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->store->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Punto de llegada:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->destino_store}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Fecha de emision:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->fecha}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Motivo: </span>
                    <span class="fw-normal text-blue float-end">{{$salida->motivo->name}}</span>
                </div>
            </td>
        </tr>
        
    </table>

    <span class="text-uppercase border-top border-primary fw-bold d-block pt-2" style="font-size: 12px">datos del transportista</span>
    <table class="w-100 pb-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Nombre:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->name}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Brevete:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->brevete}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Domicilio:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Nro. Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Placa:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->placa}}</span>
                </div>
            </td>
            
        </tr>
        
    </table>

    <table class="w-100" style="font-size: 10px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">CÓDIGO</th>
                <th class="border" style="width: 40%">DESCRIPCIÓN</th>
                <th class="border" style="width: 10%">ORDEN FAB.</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">UNIDAD MEDIDA</th>
                <th class="border" style="width: 10%">PESO TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            @foreach($detallesalida as $item)
                <tr> 
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->codigo}}</td>
                    <td class=" align-top text-blue border-start" style="width: 40%">{{$item->name}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->orden_fabricacion}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->cantidad}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->medida}}</td>
                    <td class=" align-top text-blue border-start border-end" style="width: 10%">{{$item->peso_total}}</td>
                </tr>
            @endforeach
            
            <tr>
                <td class=" align-top border-start border-bottom" style="height: 100px"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom border-end"></td>

            </tr>
        </tbody>
        
    </table>

    <div class="pie">
        <table class="w-100">
            <tbody>
                <tr>
                    <td style="width: 36%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">V°B°</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">Recibí Conforme</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <p class="text-end text-uppercase text-danger">Control Adm.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- guia destinatario --}}
    <div class="page-break"></div>

    
    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                <img src="{{ public_path('images/KAITACORPORATIVO2.png') }}" class=" card-img" style="height:85px" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">KAITA INTERNATIONAL S.A.C</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin - Sector Segundo Lima - Lima - Villa Maria Del Triunfo</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">968370868 - 945949674</span>
            </td>
            <td style="width: 35%">
                <div class="card text-center border border-primary">
                    <div class="py-1">
                        <span class="text-uppercase my-3 fw-bold ">R.U.C. 20608321773</span>
                    </div>
                    <div class="bg-primary py-1 float-center">
                        <span class="text-uppercase text-white fw-bold py-1" style="font-size: 15px">Guía de remisión - Remitente</span>
                    </div>
                    <div class="py-1">
                        <span class="text-uppercase my-3">{{$salida->nro_serie_guia}} - <span class="text-red fw-bold lead">N° {{$salida->nguia}}</span></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w-100 py-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Sr.(es):</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Dirección:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->cliente->user->persona->identificacion.' - '.$salida->cliente->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold">Tipo y N° comprobante de pago:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->tipo_comprobante.' - '.$salida->nro_comprobante}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">Punto de partida:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->store->name}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Punto de llegada:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->destino_store}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Fecha de emision:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->fecha}}</span>
                </div>
                <div class="clearfix py-2">
                    <span class="fw-bold ">Motivo: </span>
                    <span class="fw-normal text-blue float-end">{{$salida->motivo->name}}</span>
                </div>
            </td>
        </tr>
        
    </table>

    <span class="text-uppercase border-top border-primary fw-bold d-block pt-2" style="font-size: 12px">datos del transportista</span>
    <table class="w-100 pb-2" style="font-size: 12px">
        <tr>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold">Nombre:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->name}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Brevete:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->brevete}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%">
                <div class="clearfix">
                    <span class="fw-bold ">Domicilio:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Nro. Identificación:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->user->persona->nro_identificacion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">Placa:</span>
                    <span class="fw-normal text-blue float-end">{{$salida->chofer->placa}}</span>
                </div>
            </td>
            
        </tr>
        
    </table>

    <table class="w-100" style="font-size: 10px; ">
        <thead>
            <tr>
                <th class="border" style="width: 10%">CÓDIGO</th>
                <th class="border" style="width: 40%">DESCRIPCIÓN</th>
                <th class="border" style="width: 10%">ORDEN FAB.</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">UNIDAD MEDIDA</th>
                <th class="border" style="width: 10%">PESO TOTAL</th>
            </tr>
        </thead>
        <tbody class="alto">
            @foreach($detallesalida as $item)
                <tr> 
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->codigo}}</td>
                    <td class=" align-top text-blue border-start" style="width: 40%">{{$item->name}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->orden_fabricacion}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->cantidad}}</td>
                    <td class=" align-top text-blue border-start" style="width: 10%">{{$item->medida}}</td>
                    <td class=" align-top text-blue border-start border-end" style="width: 10%">{{$item->peso_total}}</td>
                </tr>
            @endforeach
            
            <tr>
                <td class=" align-top border-start border-bottom" style="height: 100px"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom"></td>
                <td class=" align-top border-start border-bottom border-end"></td>

            </tr>
        </tbody>
        
    </table>
    <div class="pie">
        <table class="w-100">
            <tbody>
                <tr>
                    <td style="width: 36%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">V°B°</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <div class="border-top border-dark">
                            <p class="text-center">Recibí Conforme</p>
                        </div>
                    </td>
                    <td style="width: 2%"></td>
                    <td style="width: 20%">
                        <p class="text-end text-uppercase text-danger">Destinatario</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Productos PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('/css/templategeneral.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ public_path('/css/main.css') }}" type="text/css"> --}}
</head>
<style>
    @font-face {
      font-family: 'Cairo';
      font-style: normal;
      font-weight: 300;
      src: local('Cairo'),  url(https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap) format('truetype');
    }

    @page {
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
                    <span class="text-uppercase fs-6 fw-bold align-middle"><img src="{{ public_path('images/KAITA 3.png') }}" class="mt-1 shadow" style="height:85px" alt="..."> KAITA INTERNATIONAL S.A.C</span>
                </div>
                <div class="float-end">
                    <span class="text-uppercase fs-6 float-end fw-bold pt-4">{{$now->format('Y-m-d')}}</span>
                </div>
               
                
            </div>
        </div>
    </header>
    <div class="text-center">
        
        <span class="text-uppercase fs-6 pt-3 text-center fw-bold d-block">Reporte total de nombres de productos</span>
        <br>
        <table class="w-100" style="font-size: 13px;">
            <thead class="bg-secondary text-white">
                <tr>
                    <th  class="border-0 py-2 border-secondary text-center">N°</th>
                    <th  class="border-0 py-2 border-secondary text-center">Código</th>
                    <th  class="border-0 py-2 border-secondary text-center">Producto</th>
                    <th  class="border-0 py-2 border-secondary text-center">Marca</th>
                    <th  class="border-0 py-2 border-secondary text-center">Categoría</th>
                    <th  class="border-0 py-2 border-secondary text-center">Medida</th>
                    <th  class="border-0 py-2 border-secondary text-center">Precio</th>

                </tr>
            </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->id}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->codigo}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->name}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->marca->name}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->category->name}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->medida->name}}</td>
                            <td class="border-bottom py-2 border-secondary text-center">{{$producto->precio}}<</td>
                        </tr> 
                    @endforeach
                </tbody>
        </table>

        <div class="text-end pt-3">
            <span>Total de productos registrados: <span class="text-primary fw-bold" style="font-size: 25px">{{$productos->count()}}</span></span>
        </div>
    </div>
    <br>
{{-- 
    <footer>
        Copyright &copy; <?php echo date("Y");?> 
    </footer> --}}

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Cairo, sans-serif", "normal");
                $pdf->text(270, 820, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>
</body>
</html>
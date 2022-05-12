<?php

use App\Http\Controllers\almacenController;
use App\Http\Controllers\areasController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\documentacionController;
use App\Http\Controllers\etiquetasController;
use App\Http\Controllers\ingresosController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\marcasController;
use App\Http\Controllers\medidasController;
use App\Http\Controllers\motivosController;
use App\Http\Controllers\movimientosController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\salidasController;
use App\Http\Controllers\tiposController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ChoferController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('error', function(){
    abort('404');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('adminlte', [App\Http\Controllers\Controller::class, 'index']);

// rutas para modulo almacen

    // Configuracion
        Route::get('configuracion-de-almacen', [App\Http\Controllers\configuracionalmacenController::class, 'index']);

        Route::resource('almacen', almacenController::class);
    
        Route::resource('areas', areasController::class);
        Route::get('/area/filtro',  [areasController::class, 'getArea']);
        
        Route::resource('categorias', categoriasController::class);

        Route::resource('marcas', marcasController::class);

        Route::resource('medidas', medidasController::class);

        Route::resource('etiquetas', etiquetasController::class);

        Route::resource('tipos', tiposController::class);

        Route::resource('motivos', motivosController::class);
    // Fin Configuracion

    //
    Route::resource('productos', productosController::class);
    Route::get('/images/{id}/delete', [productosController::class, 'deleteImage']);
    //

    // Rutas para movimientos
        Route::resource('ingresos', ingresosController::class);
        // Rutas para movimientos-Ingreso
        Route::get('/producto/filtro', [ingresosController::class, 'getProducto']);
        Route::get('/entrada/destino',  [ingresosController::class, 'getArea']);
        Route::get('/entrada/salida_de',  [ingresosController::class, 'getSalida_de']);
        //
        // Rutas para movimientos-Salida
        Route::get('/producto/filtro/venta', [ingresosController::class, 'getProductoVenta']);
        Route::get('/salidas/lote', [ingresosController::class, 'getLote']);
        Route::get('/salidas/pedido', [ingresosController::class, 'getPedido']);
        Route::get('/salidas/cliente', [ingresosController::class, 'getCliente']);
        Route::get('/salidas/choferes', [ingresosController::class, 'getChofer']);
        Route::get('/salidas/almacen', [ingresosController::class, 'getAlmacen']);
        Route::get('/salidas/entrada_almacen', [ingresosController::class, 'getEntrada_Almacen']);
        Route::resource('salidas', salidasController::class);
        Route::resource('clientes', ClienteController::class);
        Route::resource('choferes', ChoferController::class);
        //
    //Fin rutas para movimientos
        
        Route::resource('inventario', inventarioController::class);
        Route::get('inventario/almacen/{store}', [inventarioController::class, 'stores'])->name('ingresos.store');

    // Rutas para comprobantes de movimiento y guía
        Route::get('/ingresos/movimiento-ingreso-pdf/{ingreso}', [ingresosController::class, 'getMovimientoPdf'])->name('movimiento_ingreso.pdf');

        Route::get('/salidas/movimiento-salida-pdf/{salida}', [salidasController::class, 'getMovimientoPdf'])->name('movimiento_salida.pdf');
        Route::get('/salidas/guia-salida-pdf/{salida}', [salidasController::class, 'getGuiaPdf'])->name('guia_salida.pdf');
    // Fin rutas para comprobantes de movimiento y guía

    // Rutas para reportes
        Route::get('almacen/export/reporte-excel', [almacenController::class, 'reporteExcel']);
        Route::get('almacen/export/reporte-print-pdf', [almacenController::class, 'reportePrintPdf'])->name('print-almacenes.pdf');

        Route::get('categorias/export/reporte-excel', [categoriasController::class, 'reporteExcel']);
        Route::get('categorias/export/reporte-print-pdf', [categoriasController::class, 'reportePrintPdf'])->name('print-categories.pdf');

        Route::get('productos/export/reporte-excel', [productosController::class, 'reporteExcel']);
        Route::get('productos/export/reporte-print-pdf', [productosController::class, 'reportePrintPdf'])->name('print-productos.pdf');

        Route::get('ingresos/export/reporte-excel', [ingresosController::class, 'reporteExcel']);
        Route::get('ingresos/export/reporte-print-pdf', [ingresosController::class, 'reportePrintPdf'])->name('print-ingresos.pdf');

        Route::get('salidas/export/reporte-excel', [salidasController::class, 'reporteExcel']);
        Route::get('salidas/export/reporte-print-pdf', [salidasController::class, 'reportePrintPdf'])->name('print-salidas.pdf');

        Route::get('inventario/export/reporte-excel/{store}', [inventarioController::class, 'reporteExcel']);
        Route::get('inventario/export/reporte-print-pdf/{store}', [inventarioController::class, 'reportePrintPdf'])->name('print-inventario.pdf');
    // Fin rutas para reportes

// fin rutas para el modulo almacen

// otros
    Route::get('acerca-de', [documentacionController::class, 'acercade']);

    Route::get('ayuda', [documentacionController::class, 'ayuda']);

    Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout']);


// fin otros
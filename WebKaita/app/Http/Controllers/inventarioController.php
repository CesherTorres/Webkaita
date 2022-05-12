<?php

namespace App\Http\Controllers;

use App\Exports\InventariosExport;
use App\Models\Ingreso;
use App\Models\Inventario;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class inventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = DB::table('stores as s')
        ->join('inventarios as inv', 's.id', '=', 'inv.store_id')
        ->join('productos as p', 'p.id', '=', 'inv.producto_id')
        ->select('s.name', 's.direccion', 's.slug', 's.id', DB::raw('sum(inv.cantidad) as total'))
        ->groupBy('s.name', 's.direccion', 's.slug', 's.id')
        ->get();
        return view('inventario.index', compact('stores'));
    }

    public function stores(Store $store)
    {
        $store=Store::find($store->id);
        $inventario = DB::table('inventarios as inv')
        ->join('productos as p', 'p.id', '=', 'inv.producto_id')
        ->join('tipos as t', 't.id', '=', 'p.tipo_id')
        ->join('categories as c', 'c.id', '=', 'p.category_id')
        ->join('medidas as m', 'm.id', '=', 'p.medida_id')
        ->select('inv.*', 'p.*', 't.name as tipo', 'm.name as medida')
        ->where('inv.store_id', '=', $store->id)
        ->get();
        $inv = DB::table('inventarios as inv')
        ->select(DB::raw('sum(inv.cantidad) as total'))
        ->where('inv.store_id', '=', $store->id)
        ->get();
        return view('inventario.inventarios', compact('inventario', 'store', 'inv'));
    }

    // reportes
    public function reporteExcel()
    {
        return Excel::download(new InventariosExport, 'Kaita-Inventario-Almacen.xlsx');
    }

    public function reportePrintPdf(Store $store)
    {
        $now = Carbon::now();
        $store=Store::find($store->id);
        $inventario = DB::table('inventarios as inv')
        ->join('productos as p', 'p.id', '=', 'inv.producto_id')
        ->join('tipos as t', 't.id', '=', 'p.tipo_id')
        ->join('categories as c', 'c.id', '=', 'p.category_id')
        ->join('medidas as m', 'm.id', '=', 'p.medida_id')
        ->select('inv.*', 'p.*', 't.name as tipo', 'c.name as categoria', 'm.name as medida')
        ->where('inv.store_id', '=', $store->id)
        ->get();
        $inv = DB::table('inventarios as inv')
        ->select(DB::raw('sum(inv.cantidad) as cantidadtotal'), DB::raw('count(inv.id) as total'))
        ->where('inv.store_id', '=', $store->id)
        ->get();
        $pdf = PDF::loadView('reportes.almacen.inventario-reportePdf', ['store'=>$store, 'inventario'=>$inventario, 'inv'=>$inv, 'now'=>$now]);
        return $pdf->stream('Reporte-Inventario-PDF-'.$store->name.'.pdf');
    }
}

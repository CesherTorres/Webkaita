<?php

namespace App\Http\Controllers;

use App\Exports\SalidasExport;
use App\Http\Requests\StoreSalidaRequest;
use App\Models\Salida;
use App\Models\Area;
use App\Models\Chofer;
use App\Models\Ingreso;
use App\Models\Motivo;
use App\Models\Producto;
use App\Models\Store;
use App\Models\Tipo;
use App\Models\Cliente;
use App\Models\Inventario;
use App\Models\Detallesalida;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Luecano\NumeroALetras\NumeroALetras;
class salidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::all();
        return view('movimientos.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        $tipos = Tipo::all();
        $motivos = Motivo::all()->where('tipo_motivo', '=', 'Salida');
        $productos = Producto::all();
        // $clientes = Cliente::all();
        $clientes = DB::table('clientes as cl')
        ->join('users as u', 'cl.user_id', '=', 'u.id')
        ->join('personas as p', 'u.persona_id', '=', 'p.id')
        ->join('tipousuarios as tp', 'u.tipousuario_id', '=', 'tp.id')
        ->select('cl.id', 'p.name', 'p.nro_identificacion')
        ->where('u.tipousuario_id', '=', '4')
        ->get();
        // $choferes = Chofer::all();
        $choferes = DB::table('choferes as ch')
        ->join('users as u', 'ch.user_id', '=', 'u.id')
        ->join('personas as p', 'u.persona_id', '=', 'p.id')
        ->join('tipousuarios as tp', 'u.tipousuario_id', '=', 'tp.id')
        ->select('ch.id', 'p.name', 'ch.brevete')
        ->where('u.tipousuario_id', '=', '3')
        ->get();
        $now = Carbon::now();
        $salidas = Salida::all();
        $nubRow =count($salidas)+1;
        $codigo = $now->format('Ymd').$nubRow.'-MS';
        return view('movimientos.salidas.create',compact('stores', 'tipos', 'motivos', 'now', 'productos', 'codigo','clientes', 'choferes'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salida = Salida::all();
        $now = Carbon::now();
        $nubRow =count($salida)+1;
        $codigo = $now->format('Ymd').$nubRow.'-MS';

        $salida = new Salida();
        $salida->codigo = $codigo;
        $salida->slug = $codigo;
        $salida->total_product = $request->input('total_product');
        $salida->fecha = $request->input('fecha');
        $salida->nro_serie_guia = $request->input('nroserie');
        $salida->nguia = $request->input('nroguia');
        $salida->tipo_comprobante = $request->input('tipo_comprobante');
        $salida->nro_comprobante = $request->input('nrocomprobante');
        $salida->motivo_id = $request->input('motivo_id');
        $salida->tipo_id = $request->input('tipo_id');
        $salida->store_id = $request->input('store_id');
        $salida->destino_store = $request->input('_entrada_id');
        $salida->forma_pago =  $request->input('forma_pago');
        $salida->cliente_id =  $request->input('cliente_id');
        $salida->chofer_id =  $request->input('chofer_id');
        $salida->almacenero_id = Auth::user()->almacenero->id;
        $salida->save();
        
        
        $id_inventarios = $request->input('invents');
        $id_producto = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $oldcantidad = $request->input('old_cantidad');
        $peso_total = $request->input('peso_total');
        $lote = $request->input('lote');
        $precio = $request->input('precio');
        $ordenfabricacion = $request->input('ordenfabricacion');
        $fechavencimiento = $request->input('fechavencimiento');
        $observaciones = $request->input('observaciones');
        $almacen_id = $request->input('almacen_id');

        $cont = 0;
        while ($cont < count($id_producto)) {
            $detalle = new Detallesalida();
            $detalle->id_salida = $salida->id;
            $detalle->id_inventario = $id_inventarios;
            $detalle->store_id = $almacen_id[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->peso_total = $peso_total[$cont];
            $detalle->precio = $precio[$cont];
            $detalle->lote = $lote[$cont];
            $detalle->orden_fabricacion = $ordenfabricacion[$cont];
            $detalle->fecha_vencimiento = $fechavencimiento[$cont];
            $detalle->observaciones = $observaciones[$cont];
            $detalle->save();

            $inventarios_update = new Inventario;
            $array_movientos = ['lote' => $lote[$cont], 'producto_id' => $id_producto[$cont], 'store_id' => $almacen_id[$cont] ,'ordenfabricacion' => $ordenfabricacion[$cont],'cantidad' => $cantidad[$cont], 'movimiento' => 'Salida'];
            $inventarios_update->inventariar($array_movientos);
            $cont = $cont+1;
            // $inventarios_update = Inventario::updateOrCreate(
            //     ['lote' => $lote[$cont], 'producto_id' => $id_producto[$cont]],
            //     ['cantidad' => ((int)$oldcantidad[$cont])-((int)$cantidad[$cont])]
            // );
        }
        // 
        // dump($detalle);
        return redirect()->route('salidas.index')->with('addentrada', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        $detallesalida = DB::table('detallesalidas as dt')
            ->join('inventarios as inv', 'inv.id', '=', 'dt.id_inventario')
            ->join('productos as p', 'p.id', '=', 'inv.producto_id')
            ->join('medidas as m', 'm.id', '=', 'p.medida_id')
            ->select('p.*', 'm.name as medida', 'dt.*')
            ->where('dt.id_salida', $salida->id)
            ->get();

        $dt = DB::table('detallesalidas as dt')
        ->select(DB::raw('sum(dt.cantidad*dt.precio) as total'))
        ->where('dt.id_salida', $salida->id)
        ->get();

        return view('movimientos.salidas.show', compact('detallesalida', 'salida', 'dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // reportes
    public function reporteExcel()
    {
        return Excel::download(new SalidasExport, 'Kaita-Ingresos-Registrados.xlsx');
    }

    public function reportePrintPdf()
    {
        $now = Carbon::now();
        $salidas = Salida::all();
        $pdf = PDF::loadView('reportes.almacen.salidas-reportePdf', ['salidas'=>$salidas, 'now'=>$now]);
        return $pdf->stream('Reporte-salidas-PDF.pdf');
    }

    //guía y reporte de movimiento
    public function getMovimientoPdf(Salida $salida)
    {
        
        $detallesalida = DB::table('detallesalidas as dt')
            ->join('inventarios as inv', 'inv.id', '=', 'dt.id_inventario')
            ->join('productos as p', 'p.id', '=', 'inv.producto_id')
            ->join('medidas as m', 'm.id', '=', 'p.medida_id')
            ->select('p.*', 'm.name as medida', 'dt.*')
            ->where('id_salida', $salida->id)
            ->get();

        $dt = DB::table('detallesalidas as dt')
        ->select(DB::raw('sum(dt.cantidad*dt.precio) as total'))
        ->where('id_salida', $salida->id)
        ->get();
        $formatter = new NumeroALetras();
        $pdf = PDF::loadView('reportes.almacen.movimientos.movimiento_salida_pdf', ['salida'=>$salida, 'detallesalida'=>$detallesalida, 'dt'=>$dt, 'formatter'=>$formatter]);
        return $pdf->stream('Reporte Movimiento PDF     - '.$salida->codigo.'.pdf');
    }

    public function getGuiaPdf(Salida $salida)
    {
        
        $detallesalida = DB::table('detallesalidas as dt')
            ->join('inventarios as inv', 'inv.id', '=', 'dt.id_inventario')
            ->join('productos as p', 'p.id', '=', 'inv.producto_id')
            ->join('medidas as m', 'm.id', '=', 'p.medida_id')
            ->select('p.*', 'm.name as medida', 'dt.*')
            ->where('id_salida', $salida->id)
            ->get();
        $formatter = new NumeroALetras();
        $pdf = PDF::loadView('reportes.almacen.movimientos.guia_salida_pdf', ['salida'=>$salida, 'detallesalida'=>$detallesalida, 'formatter'=>$formatter]);
        return $pdf->stream('Guía PDF - '.$salida->codigo.'.pdf');
        // return view('reportes.almacen.movimientos.ingreso_pdf');
    }
}

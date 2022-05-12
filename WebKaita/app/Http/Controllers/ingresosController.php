<?php

namespace App\Http\Controllers;

use App\Exports\IngresosExport;
use App\Http\Requests\StoreIngresoRequest;
use App\Models\Area;
use App\Models\Ingreso;
use App\Models\Motivo;
use App\Models\Producto;
use App\Models\Store;
use App\Models\Salida;
use App\Models\Tipo;
use App\Models\Detalleingreso;
use App\Models\Inventario;
use App\Models\Cliente;
use App\Models\Chofer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use Luecano\NumeroALetras\NumeroALetras;
// use NumerosEnLetras;

class ingresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::all();
        return view('movimientos.ingresos.index', compact('ingresos'));
        
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
        $motivos = Motivo::all()->where('tipo_motivo', '=', 'Ingreso');
        $now = Carbon::now();
        $productos = Producto::all();
        $ingresos = Ingreso::all();
        $nubRow =count($ingresos)+1;
        $codigo = $now->format('Ymd').$nubRow.'-MI';
        return view('movimientos.ingresos.create',compact('stores', 'tipos', 'motivos', 'now', 'productos', 'codigo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingresos = Ingreso::all();
        $now = Carbon::now();
        $nubRow =count($ingresos)+1;
        $codigo = $now->format('Ymd').$nubRow.'-MI';
        $ingreso = new Ingreso();
        $ingreso->codigo = $codigo;
        $ingreso->slug = $codigo;
        $ingreso->nguia = $request->input('nguia');
        $ingreso->fecha = $request->input('fecha');
        $ingreso->total_product = $request->input('total_product');
        $ingreso->store_id = $request->input('_store_destino');
        $ingreso->motivo_id = $request->input('motivo_id');
        $ingreso->tipo_id = $request->input('_tipo');
        $ingreso->salida_store = $request->input('_store_salida');
        $ingreso->almacenero_id = Auth::user()->almacenero->id;
        $ingreso->save();
        // 
        $id_producto = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $lote = $request->input('lote');
        $precio = $request->input('precio');
        $ordenfabricacion = $request->input('ordenfabricacion');
        $fechavencimiento = $request->input('fechavencimiento');
        $area = $request->input('area');
        $observaciones = $request->input('observaciones');
        $almacen_id = $request->input('almacen_id');

        $cont = 0;
        // Inventario::where('lote',$request->input('lote'))
        // ->where('producto_id',$request->input('producto'))
        // ->where('store_id',  $request->input('_store_destino'))->exists();
        if($inventario=DB::table('inventarios')->select('lote','producto_id','store_id')
        ->where('lote',$request->input('lote'))
        ->where('producto_id',$request->input('producto'))
        ->where('store_id',  $request->input('almacen_id'))->exists()){

                while ($cont < count($id_producto)) {
                    $detalle = new Detalleingreso();
                    $detalle->ingreso_id = $ingreso->id;
                    $detalle->producto_id = $id_producto[$cont];
                    $detalle->store_id = $almacen_id[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->lote = $lote[$cont];
                    $detalle->precio = $precio[$cont];
                    $detalle->orden_fabricacion = $ordenfabricacion[$cont];
                    $detalle->fecha_vencimiento = $fechavencimiento[$cont];
                    $detalle->area_destino = $area[$cont];
                    $detalle->observaciones = $observaciones[$cont];
                    $detalle->save();
                    
                    $inventarios_update = new Inventario;
                    $array_movientos = ['lote' => $lote[$cont], 'producto_id' => $id_producto[$cont], 'store_id' => $almacen_id[$cont] ,'ordenfabricacion' => $ordenfabricacion[$cont],'cantidad' => $cantidad[$cont], 'movimiento' => 'Ingreso'];
                    $inventarios_update->inventariar($array_movientos);
                    $cont = $cont+1;
                }
                
                // $inventario=DB::table('inventarios')
                // ->where('lote',$request->input('lote'))
                // ->where('producto_id',$request->input('producto'))
                // ->where('store_id',  $request->input('_store_destino'))->get();

                // $inventario->increment('lote',$request->input('lote'));
        }else{
                while ($cont < count($id_producto)) {
                    $detalle = new Detalleingreso();
                    $detalle->ingreso_id = $ingreso->id;
                    $detalle->producto_id = $id_producto[$cont];
                    $detalle->store_id = $almacen_id[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->lote = $lote[$cont];
                    $detalle->precio = $precio[$cont];
                    $detalle->orden_fabricacion = $ordenfabricacion[$cont];
                    $detalle->fecha_vencimiento = $fechavencimiento[$cont];
                    $detalle->area_destino = $area[$cont];
                    $detalle->observaciones = $observaciones[$cont];
                    $detalle->save();
                    
                    $inventarios = new Inventario();
                    $inventarios->store_id = $almacen_id[$cont];
                    $inventarios->producto_id = $id_producto[$cont];
                    $inventarios->cantidad = $cantidad[$cont];
                    $inventarios->lote = $lote[$cont];
                    $inventarios->precio = $precio[$cont];
                    $inventarios->orden_fabricacion = $ordenfabricacion[$cont];
                    $inventarios->fecha_vencimiento = $fechavencimiento[$cont];
                    $inventarios->area_destino = $area[$cont];
                    $inventarios->observaciones = $observaciones[$cont];
                    $inventarios->save();
                    $cont = $cont+1;
                }
        }
        // 
        return redirect()->route('ingresos.index')->with('addentrada', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show(Ingreso $ingreso)
    {
        // $inventario = Inventario::all()->where('ingreso_id', $ingreso->id);
        $detalleingreso = DB::table('detalleingresos as dt')
        ->join('productos as p', 'p.id', '=', 'dt.producto_id')
        ->join('medidas as m', 'm.id', '=', 'p.medida_id')
        ->select('p.*', 'm.name as medida', 'dt.*')
        ->where('dt.ingreso_id', $ingreso->id)
        ->get();
        return view('movimientos.ingresos.show', compact('ingreso', 'detalleingreso'));
    }


    public function getMovimientoPdf(Ingreso $ingreso)
    {
        
        $detalleingreso = DB::table('detalleingresos as dt')
        ->join('productos as p', 'p.id', '=', 'dt.producto_id')
        ->join('medidas as m', 'm.id', '=', 'p.medida_id')
        ->select('p.*', 'm.name as medida', 'dt.*','dt.precio as precio_dt')
        ->where('dt.ingreso_id', $ingreso->id)
        ->get();
        $dt = DB::table('detalleingresos as dt')
        ->join('productos as p', 'p.id', '=', 'dt.producto_id')
        ->select(DB::raw('sum(dt.cantidad*dt.precio) as total'))
        ->where('dt.ingreso_id', '=', $ingreso->id)
        ->get();
        $formatter = new NumeroALetras();
        $pdf = PDF::loadView('reportes.almacen.movimientos.movimiento_ingreso_pdf', ['ingreso'=>$ingreso, 'detalleingreso'=>$detalleingreso, 'formatter'=>$formatter, 'dt'=>$dt]);
        return $pdf->stream('Reporte Movimiento PDF - '.$ingreso->codigo.'.pdf');
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
    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index')->with('delete', 'ok');
    }

    // Obtener areas y productos de Movimiento-Entrada
    public function getArea(Request $request){
        if($request->ajax()){
            $areas = DB::table('stores as sto')
            ->join('areas as a','a.store_id','=','sto.id')
            ->select('a.id','a.name','sto.direccion','sto.referencia','sto.descripcion')
            ->where('a.store_id',$request->store_id)->get();
            // $areas = Area::where('store_id',$request->store_id)->get();
            foreach($areas as $area){
                $areasArray[$area->id] = [$area->name,$area->referencia,$area->direccion,$area->descripcion];
            }
            return response()->json($areasArray);
        }
    }
    public function getSalida_de(Request $request){
        if($request->ajax()){
            $almacen = DB::table('areas as a')
            ->join('stores as sto','a.store_id','=','sto.id')
            ->select('sto.id','sto.direccion','sto.referencia','sto.descripcion')
            ->where('sto.id',$request->store_id)->get();
            // $almacen = Store::where('id',$request->store_id)->get();
            foreach($almacen as $almacens){
                $almacensArray[$almacens->id] = [$almacens->referencia, $almacens->direccion,$almacens->descripcion];
            }
            return response()->json($almacensArray);
        }
    }
    public function getProducto(Request $request){
        if($request->ajax()){
            // $productos = DB::table('tipos as t')
            // ->join('productos as pro','t.id','=','pro.tipo_id')
            // ->join('inventarios as inv','pro.id','=','inv.producto_id')
            // ->select('pro.id','pro.name')->where('tipo_id',$request->tipo_id)->get();
            $productos = Producto::where('tipo_id',$request->tipo_id)->get();
            foreach($productos as $producto){
                $productoArray[$producto->id] = $producto->name;
            }
            return response()->json($productoArray);
        }
    }
    //

    // Obtener areas y productos de Movimiento-Salida
    public function getProductoVenta(Request $request){
        if($request->ajax()){
            $productos = DB::table('tipos as t')
            ->join('productos as pro','t.id','=','pro.tipo_id')
            ->join('inventarios as inv','pro.id','=','inv.producto_id')
            ->select('pro.id','pro.name','inv.id as inventario_id')->where('inv.cantidad','>',0)->where('pro.tipo_id',$request->tipo_id)->get();
            // $productos = Producto::where('tipo_id',$request->tipo_id)->get();
            foreach($productos as $producto){
                $productoArray[$producto->id] = [$producto->name, $producto->inventario_id];
            }
            return response()->json($productoArray);
        }
    }
    //del controlador de salida
    public function getLote(Request $request){
        if($request->ajax()){
            // $lote = DB::table('areas as a')
            //     ->join('stores as sto','a.store_id','=','sto.id')
            //     ->join('ingresos as ing','sto.id','=','ing.store_id')
            //     ->join('detalleingresos as dti','ing.id','=','dti.ingreso_id')
            //     ->select('dti.id','dti.lote')->where('dti.producto_id',$request->producto_id)
            //     ->where('dti.ingreso_id',$request->ingreso_id)->get();
            $lote = Inventario::where('producto_id',$request->producto_id)->where('store_id',$request->ingreso_id)->get();
            foreach($lote as $lotes){
                $lotesArray[$lotes->id] = [$lotes->lote,$lotes->producto_id,$lotes->store_id];
            }
            return response()->json($lotesArray);
        }
    }
    public function getPedido(Request $request){
        if($request->ajax()){
            $lote = Inventario::where('lote',$request->lote_id)->where('producto_id',$request->producto_id)->where('store_id',$request->ingreso_id)->get();
            foreach($lote as $lotes){
                // list($lotes->orden_fabricacion, $lotes->cantidad) = $lotes;
                $lotesArray[$lotes->id] = [$lotes->orden_fabricacion, $lotes->fecha_vencimiento, $lotes->cantidad, $lotes->precio];
            }
            return response()->json($lotesArray);
        }
    }
    public function getCliente(Request $request){
        if($request->ajax()){
            $clientes = Cliente::where('id',$request->identifi_id)->get();
            foreach($clientes as $cliente){
                // list($lotes->orden_fabricacion, $lotes->cantidad) = $lotes;
                $clienteArray[$cliente->id] = [$cliente->name, $cliente->direccion];
            }
            return response()->json($clienteArray);
        }
    }
    public function getChofer(Request $request){
        if($request->ajax()){
            $choferes = Chofer::where('id',$request->chofer_id)->get();
            foreach($choferes as $chofere){
                // list($lotes->orden_fabricacion, $lotes->cantidad) = $lotes;
                $chofereArray[$chofere->id] = [$chofere->name, $chofere->direccion,$chofere->brevete,$chofere->placa];
            }
            return response()->json($chofereArray);
        }
    }
    public function getAlmacen(Request $request){
        if($request->ajax()){
            
            if((Salida::where('store_id','=', $request->store_id))->exists()) {
            $almacen = DB::table('stores as sto')
            ->join('areas as a','a.store_id','=','sto.id')
            ->join('salidas as sal','sto.id','=','sal.store_id')
            ->join('detallesalidas as dts','sal.id','=','dts.id_salida')
            ->join('inventarios as inv','inv.id','=','dts.id_inventario')
            ->join('productos as pro','pro.id','=','inv.producto_id')
            ->select('inv.producto_id as produ_id','pro.name as producto','inv.store_id as almacen_id','sto.direccion','sto.referencia','sto.descripcion','sal.nguia as nro_guia', 'sal.nro_serie_guia as nro_serie','inv.id as inventario_id')
            ->where('inv.store_id',$request->store_id)->get();
            // $almacen = Store::where('id',$request->store_id)->get();
            foreach($almacen as $almacens){
                $almacensArray[$almacens->produ_id] = [$almacens->direccion, $almacens->referencia, $almacens->descripcion,$almacens->nro_guia, $almacens->nro_serie,$almacens->producto, $almacens->almacen_id];
            }
            return response()->json($almacensArray);
            }else{
                $almacen = DB::table('productos as pro')
                ->join('inventarios as inv','pro.id','=','inv.producto_id')
                ->join('stores as sto','inv.store_id','=','sto.id')
                ->select('inv.store_id as almacen_id','sto.direccion','sto.referencia','sto.descripcion','inv.producto_id as produ_id','pro.name as producto','inv.id as inventario_id')
                ->where('inv.store_id',$request->store_id)->get();
                // $almacen = Store::where('id',$request->store_id)->get();
                foreach($almacen as $almacens){
                    $almacensArray[$almacens->produ_id] = [$almacens->direccion, $almacens->referencia, $almacens->descripcion,null,$almacens->producto, $almacens->almacen_id, $almacens->inventario_id];
            }
            return response()->json($almacensArray);
        }
        
    }
}
    public function getEntrada_Almacen(Request $request){
        if($request->ajax()){
            $almacen = DB::table('areas as a')
            ->join('stores as sto','a.store_id','=','sto.id')
            ->select('sto.id','sto.direccion','sto.referencia','sto.descripcion')
            ->where('sto.id',$request->store_id)->get();
            // $almacen = Store::where('id',$request->store_id)->get();
            foreach($almacen as $almacens){
                $almacensArray[$almacens->id] = [$almacens->direccion, $almacens->referencia, $almacens->descripcion];
            }
            return response()->json($almacensArray);
        }
    }




    // reportes
    public function reporteExcel()
    {
        return Excel::download(new IngresosExport, 'Kaita-Ingresos-Registrados.xlsx');
    }

    public function reportePrintPdf()
    {
        $now = Carbon::now();
        $ingresos = Ingreso::all();
        $pdf = PDF::loadView('reportes.almacen.ingresos-reportePdf', ['ingresos'=>$ingresos, 'now'=>$now]);
        return $pdf->stream('Reporte-ingresos-PDF.pdf');
    }
}

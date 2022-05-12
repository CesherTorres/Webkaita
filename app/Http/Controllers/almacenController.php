<?php

namespace App\Http\Controllers;

use App\Exports\StoresExport;
use App\Http\Requests\StoreAlmacenRequest;
use App\Models\Area;
use App\Models\Store;
use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class almacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Store::all();
        return view('configuracion-de-almacen.almacenes.index', compact('almacenes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        $ubigeos = Ubigeo::all();
        return view('configuracion-de-almacen.almacenes.create', compact('now', 'ubigeos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlmacenRequest $request)
    {
        if($request->hasFile('plano')){
            $file = $request->file('plano');
            $plano = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/planos/', $plano);
        }
        $almacen = new Store();
        $almacen->name = $request->input('name');
        $almacen->slug = Str::slug($request->input('name'));
        $almacen->direccion = $request->input('direccion');
        $almacen->referencia = $request->input('referencia');
        $almacen->descripcion = $request->input('descripcion');
        $almacen->fecha = $request->input('fecha');
        $almacen->plano = $plano;
        $almacen->ubigeo_id = $request->input('ubigeo_id');
        $almacen->save();
        return redirect()->route('almacen.index')->with('addalmacen', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $almacen)
    {
        return view('configuracion-de-almacen.almacenes.show', compact('almacen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $almacen)
    {
        $ubigeos = Ubigeo::all();
        return view('configuracion-de-almacen.almacenes.edit', compact('ubigeos', 'almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $almacen)
    {
        $almacen->fill($request->except('plano', 'fecha'));
        if ($request->hasFile('plano')) {
            $file = $request->file('plano');
            $plano = time().$file->getClientOriginalName();
            if ($almacen->plano) {
                $file_path = public_path(). '/images/planos/'.$almacen->plano;
                File::delete($file_path);
                $almacen->update([
                    $almacen->plano = $plano,
                    $file->move(public_path().'/images/planos/', $plano)
                ]);
            }else{
                $almacen->create([
                    $almacen->plano = $plano,
                    $file->move(public_path().'/images/planos/', $plano)
                ]);
            }
        }
        $almacen->save();
        return redirect()->route('almacen.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $almacen)
    {
        $file_path = public_path(). '/images/planos/'.$almacen->plano;
        File::delete($file_path);
        $almacen->delete();
        return redirect()->route('almacen.index')->with('delete', 'ok');
    }


    // reportes
    public function reporteExcel()
    {
        return Excel::download(new StoresExport, 'Kaita-Almacenes-Registrados.xlsx');
    }

    public function reportePrintPdf()
    {
        $now = Carbon::now();
        $almacenes = Store::all();
        $pdf = PDF::loadView('reportes.almacen.almacen-reportePdf', ['almacenes'=>$almacenes, 'now'=>$now]);
        return $pdf->stream('Reporte-Almacen-PDF.pdf');
    }
}

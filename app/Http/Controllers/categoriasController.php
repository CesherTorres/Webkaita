<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::all();
        return view('configuracion-de-almacen.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        $categoria = new Category();
        $categoria->name = $request->input('name');
        $categoria->slug = Str::slug($request->input('name'));
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();
        return redirect()->route('categorias.index')->with('addcategoria', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Category $categoria)
    {
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->route('categorias.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('delete', 'ok');
    }

    // reportes
    public function reporteExcel()
    {
        return Excel::download(new CategoriesExport, 'Kaita-Categorias-Registrados.xlsx');
    }

    public function reportePrintPdf()
    {
        $now = Carbon::now();
        $categorias = Category::all();
        $pdf = PDF::loadView('reportes.almacen.categorias-reportePdf', ['categorias'=>$categorias, 'now'=>$now]);
        return $pdf->stream('Reporte-Categorias-PDF.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedidaRequest;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class medidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::all();
        return view('configuracion-de-almacen.medidas.index', compact('medidas'));
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
    public function store(StoreMedidaRequest $request)
    {
        $medida = new Medida();
        $medida->name = $request->input('name');
        $medida->slug = Str::slug($request->input('name'));
        $medida->abreviatura = $request->input('abreviatura');
        $medida->descripcion = $request->input('descripcion');
        $medida->save();
        return redirect()->route('medidas.index')->with('addmedida', 'ok');
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
    public function update(Request $request, Medida $medida)
    {
        $medida->fill($request->all());
        $medida->save();
        return redirect()->route('medidas.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medida $medida)
    {
        $medida->delete();
        return redirect()->route('medidas.index')->with('delete', 'ok');
    }
}

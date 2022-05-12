<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoRequest;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class tiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('configuracion-de-almacen.tipos.index', compact('tipos'));
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
    public function store(StoreTipoRequest $request)
    {
        $tipo = new Tipo();
        $tipo->name = $request->input('name');
        $tipo->slug = Str::slug($request->input('name'));
        $tipo->descripcion = $request->input('descripcion');
        $tipo->save();
        return redirect()->route('tipos.index')->with('addtipo', 'ok');
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
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->fill($request->all());
        $tipo->save();
        return redirect()->route('tipos.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index')->with('delete', 'ok');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotivoRequest;
use App\Models\Motivo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class motivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivos = Motivo::all();
        return view('configuracion-de-almacen.motivos.index', compact('motivos'));
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
    public function store(Request $request)
    {
        $motivo = new Motivo();
        $motivo->name = $request->input('name');
        $motivo->slug = Str::slug($request->input('name'));
        $motivo->tipo_motivo = $request->input('tipo_motivo');
        $motivo->descripcion = $request->input('descripcion');
        $motivo->save();
        return redirect()->route('motivos.index')->with('addmotivo', 'ok');
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
    public function update(Request $request, Motivo $motivo)
    {
        $motivo->fill($request->all());
        $motivo->save();
        return redirect()->route('motivos.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motivo $motivo)
    {
        $motivo->delete();
        return redirect()->route('motivos.index')->with('delete', 'ok');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Salida;
use Illuminate\Http\Request;

class movimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::all();
        $salidas = Salida::all();
        return view('movimientos.index', compact('ingresos', 'salidas'));
    }
}

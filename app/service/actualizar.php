<?php

namespace App\service;

use App\Models\Inventario;

class Almacen
{
    public function actualizar_cantidad($producto,$_store_destino, $lote){
        $inventario = Inventario::where('lote',$request->input('lote'))
        ->where('producto_id',$request->input('producto'))
        ->where('store_id',  $request->input('_store_destino'))->get();
        
        $inventario->increment('lote',$request->input('lote'));
    }
}
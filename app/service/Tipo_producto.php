<?php

namespace App\service;

use App\Models\Tipo;

class Tipo_producto
{
    public function get(){
        $tipos = Tipo::get();
        $tiposArray[''] = 'Selecciona un Tipo';
        foreach($tipos as $tipo){
            $tiposArray[$tipo->id] = $tipo->name;
        }
        return $tiposArray;
    }
}

        
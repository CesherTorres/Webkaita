<?php

namespace App\service;

use App\Models\Store;

class Almacen
{
    public function get(){
        $almacenes = Store::get();
        $almacenesArray[''] = 'Selecciona un Almacen';
        foreach($almacenes as $almacen){
            $almacenesArray[$almacen->id] = $almacen->name;
        }
        return $almacenesArray;
    }
}

        
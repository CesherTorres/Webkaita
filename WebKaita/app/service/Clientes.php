<?php

namespace App\service;

use App\Models\Cliente;

class Clientes
{
    public function get(){
        $cliente = Cliente::get();
        $clientesArray[''] = 'Realiza una busqueda';
        foreach($cliente as $clientes){
            $clientesArray[$clientes->id] = $clientes->identificacion;
        }
        return $clientesArray;
    }
}
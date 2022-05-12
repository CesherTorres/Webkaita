<?php

namespace App\service;

use App\Models\Chofer;

class Choferes
{
    public function get(){
        $chofer = Chofer::get();
        $chofersArray[''] = 'Realiza una busqueda';
        foreach($chofer as $chofers){
            $chofersArray[$chofers->id] = $chofers->ruc;
        }
        return $chofersArray;
    }
}
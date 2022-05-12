<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Str;

class ChoferController extends Controller
{
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->name = $request->input('name');
        $persona->slug = Str::slug($request->input('name'));
        $persona->direccion = $request->input('direccion');
        $persona->identificacion = $request->input('identificacion');
        $persona->nro_identificacion = $request->input('nro_identificacion');
        $persona->estado = 'Activo';
        $persona->save();

        $user = new User();
        $user->tipousuario_id = '3';
        $user->persona_id = $persona->id;
        $user->estado = 'Activo';
        $user->save();

        $chofer = new Chofer();
        $chofer->brevete = $request->input('brevete');
        $chofer->placa = $request->input('placa');
        $chofer->user_id = $user->id;
        $chofer->save();

        return redirect()->back();
    }
}

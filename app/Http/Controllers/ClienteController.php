<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Str;

class ClienteController extends Controller
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
        $user->tipousuario_id = '4';
        $user->persona_id = $persona->id;
        $user->estado = 'Activo';
        $user->save();

        $cliente = new Cliente();
        $cliente->user_id = $user->id;
        $cliente->save();

        return redirect()->back();
    }
}

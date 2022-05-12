<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipousuario;

class TipousuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipousuario = new Tipousuario();
        $tipousuario->name = "Administrador General";
        $tipousuario->nivel = "Master";
        $tipousuario->save();

        $tipousuario = new Tipousuario();
        $tipousuario->name = "Almacenero";
        $tipousuario->nivel = "Administrador";
        $tipousuario->save();

        $tipousuario = new Tipousuario();
        $tipousuario->name = "Chofer";
        $tipousuario->nivel = "Principal";
        $tipousuario->save();

        $tipousuario = new Tipousuario();
        $tipousuario->name = "Cliente";
        $tipousuario->nivel = "Principal";
        $tipousuario->save();
    }
}

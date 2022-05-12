<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = Persona::create([
            'name' => 'Cesar Torres Tasaico',
            'slug' => 'cesar-torres-tasaico',
            'direccion' => 'Av.',
            'identificacion' => 'DNI',
            'nro_identificacion' => '78956412',
            'estado' => 'Activo',
            'avatar' => 'avatar.png',
        ]);

        $persona = Persona::create([
            'name' => 'KAITA INTERNATIONAL S.A.C',
            'slug' => 'kaita-international-s.a.c',
            'direccion' => 'Mza. 1qa Lote. 16 P.J. San Francisco De La Tablada De Lurin',
            'identificacion' => 'RUC',
            'nro_identificacion' => '20608321773',
            'estado' => 'Activo',
            'avatar' => 'KAITA 3.png',
        ]);
    }
}

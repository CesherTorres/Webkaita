<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdministradorKaitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrador Almacenero',
            'email' => 'admin@kaita.com',
            'avatar' => 'avatar.png',
            'profesion' => 'Almacenero',
            'estado' => 'Activo',
            'tipousuario_id' => '1',
            'password' => Hash::make('Administrador'),
            'confirmpassword' => Hash::make('Administrador'),
            ]);

            $admin = User::create([
                'name' => 'Kaita_Almacen',
                'email' => 'almacen@kaita.com',
                'avatar' => 'avatar.png',
                'profesion' => 'almacenero',
                'estado' => 'Activo',
                'tipousuario_id' => '2',
                'password' => Hash::make('almacenkaita'),
                'confirmpassword' => Hash::make('almacenkaita'),
                ]);
    }
}

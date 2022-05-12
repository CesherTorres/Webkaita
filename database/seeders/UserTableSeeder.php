<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'almacen@kaita.com',
            'estado' => 'Activo',
            'tipousuario_id' => '2',
            'persona_id' => '1',
            'password' => Hash::make('almacenkaita'),
            'confirmpassword' => Hash::make('almacenkaita')
        ]);

        $user = User::create([
            'estado' => 'Activo',
            'tipousuario_id' => '4',
            'persona_id' => '2'
        ]);
    }
}

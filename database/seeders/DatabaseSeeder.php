<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TipousuarioTableSeeder::class);
        $this->call(MotivoTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AlmaceneroTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
    }
}

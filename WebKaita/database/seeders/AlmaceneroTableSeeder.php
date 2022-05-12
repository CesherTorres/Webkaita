<?php

namespace Database\Seeders;

use App\Models\Almacenero;
use Illuminate\Database\Seeder;

class AlmaceneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $almacenero = Almacenero::create([
            'user_id' => '1'
            ]);
    }
}

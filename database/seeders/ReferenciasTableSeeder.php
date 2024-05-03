<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenciasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('referencias')->insert([
            ['id' => 1, 'referencia' => 'Ref1', 'codigo' => '001'],
            ['id' => 2, 'referencia' => 'Ref2', 'codigo' => '002'],
            ['id' => 3, 'referencia' => 'Ref3', 'codigo' => '003']
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setores')->insert([
            ['setor' => 'UTI GERAL 1', 'cdc' => '1209'],
            ['setor' => 'CENTRO CIRURGICO', 'cdc' => '1202']
        ]);
    }
}

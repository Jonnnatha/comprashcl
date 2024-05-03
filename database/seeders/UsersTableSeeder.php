<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nome' => 'adm',
                'senha' => Hash::make('123'),
                'level' => 'adm',
                'cargo' => 'Gerente Compras',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'jonnatha',
                'senha' => Hash::make('123'),
                'level' => 'solicitante',
                'cargo' => 'Engenheiro Clínico',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'pedro',
                'senha' => Hash::make('123'),
                'level' => 'compras',
                'cargo' => 'Aux. Compras',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

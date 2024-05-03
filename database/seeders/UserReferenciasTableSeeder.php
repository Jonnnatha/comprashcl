<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Referencia;
use Illuminate\Support\Facades\DB;

class UserReferenciasTableSeeder extends Seeder
{
    public function run()
    {
        $comprasUsers = User::where('level', 'compras')->get(); // Pegar todos os usuários de compras
        $referencias = Referencia::all()->pluck('id'); // Pegar todos os IDs de referências

        foreach ($comprasUsers as $user) {
            foreach ($referencias as $refId) {
                DB::table('user_referencias')->insert([
                    'user_id' => $user->id,
                    'referencia_id' => $refId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}

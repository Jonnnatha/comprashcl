<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenciasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('referencias')->insert([
            ['id' => 1, 'referencia' => 'DROGAS E MEDICAMENTO', 'codigo' => '1'],
            ['id' => 2, 'referencia' => 'MATERIAL HOSPITALAR', 'codigo' => '2'],
            ['id' => 3, 'referencia' => 'MATERIAL CIRURGICO', 'codigo' => '3'],
            ['id' => 4, 'referencia' => 'MATERIAL NUTRICIONAL', 'codigo' => '4'],
            ['id' => 5, 'referencia' => 'MATERIAL LABORATORIO', 'codigo' => '5'],
            ['id' => 6, 'referencia' => 'MATERIAL RADIOLOGICO', 'codigo' => '6'],
            ['id' => 7, 'referencia' => 'GASES MEDICINAIS', 'codigo' => '7'],
            ['id' => 8, 'referencia' => 'SND', 'codigo' => '8'],
            ['id' => 9, 'referencia' => 'MATERIAL COZINHA', 'codigo' => '9'],
            ['id' => 10, 'referencia' => 'ITENS COZINHA', 'codigo' => '10'],
            ['id' => 11, 'referencia' => 'MATERIAL LIMPEZA', 'codigo' => '11'],
            ['id' => 12, 'referencia' => 'MATERIAL LAVANDERIA', 'codigo' => '12'],
            ['id' => 13, 'referencia' => 'ROUPA ENXOVAL', 'codigo' => '13'],
            ['id' => 14, 'referencia' => 'UNIF/EQUIPAMENTO DE SEGURANÇA', 'codigo' => '14'],
            ['id' => 15, 'referencia' => 'MATERIAL DE ESCRITORIO', 'codigo' => '15'],
            ['id' => 16, 'referencia' => 'MATERIAL INFORMATICA', 'codigo' => '16'],
            ['id' => 17, 'referencia' => 'MATERIAL MANUTENÇÃO', 'codigo' => '17'],
            ['id' => 18, 'referencia' => 'MATERIAL DE OBRAS', 'codigo' => '18'],
            ['id' => 19, 'referencia' => 'SANEANTES', 'codigo' => '19'],
            ['id' => 20, 'referencia' => 'CONSIGNADO', 'codigo' => '20'],
            ['id' => 21, 'referencia' => 'NÃO CONSIGNADO', 'codigo' => '21'],
            ['id' => 22, 'referencia' => 'EM ANALISE', 'codigo' => '99'],
            ['id' => 23, 'referencia' => 'HIGIENE PESSOAL', 'codigo' => '100'],
            ['id' => 24, 'referencia' => 'MATERIAL DESCARTAVEL DIVERSO', 'codigo' => '101'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ponto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PontoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ponto::create([
            'logradouro' => '1',
            'bairro' => '1',
            'numero' => '1',
            'referencia' => 'Charme Móveis'
        ]);

        Ponto::create([
            'logradouro' => '2',
            'bairro' => '2',
            'numero' => '2',
            'referencia' => 'Estação Ferroviária'
        ]);
    }
}

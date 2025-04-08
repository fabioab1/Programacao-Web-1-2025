<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar o cargo de Auxiliar Administrativo
        Cargo::create([
            'nome' => 'Auxiliar Administrativo'
        ]);

        // Criar o cargo de Motorista
        Cargo::create([
            'nome' => 'Motorista'
        ]);

        // Criar o cargo de Diretor
        Cargo::create([
            'nome' => 'Diretor de Divisão de Transporte'
        ]);
    }
}

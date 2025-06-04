<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Administradores;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([         // Para a CRUD de usuário precisa ser campo por campo, e não utilizar o requestAll(), assim como mostrado abaixo:
            'name' => 'Fábio', // 'name' => $request->name,
            'email' => 'fabio@email.com', // 'email' => $request->email,
            'password' => Hash::make('123456'), // 'password' => Hash::make($request->password)
            'role' => 'ADM', // 'role' => 'ADM',
        ]);

        User::create([         // Para a CRUD de usuário precisa ser campo por campo, e não utilizar o requestAll(), assim como mostrado abaixo:
            'name' => 'Jorge', // 'name' => $request->name,
            'email' => 'jorge@email.com', // 'email' => $request->email,
            'password' => Hash::make('123456'), // 'password' => Hash::make($request->password)
            'role' => 'MOT', // 'role' => 'ADM',
        ]);

        User::create([         // Para a CRUD de usuário precisa ser campo por campo, e não utilizar o requestAll(), assim como mostrado abaixo:
            'name' => 'Maria', // 'name' => $request->name,
            'email' => 'maria@email.com', // 'email' => $request->email,
            'password' => Hash::make('123456'), // 'password' => Hash::make($request->password)
            'role' => 'PAC', // 'role' => 'ADM',
        ]);

        Administradores::create([
            'nome' => 'Administrador',
            'cargo_id' => 1,
            'celular' => '1',
            'email' => 'fabio@email.com',
            'user_id' => 1
        ]);

    }
}

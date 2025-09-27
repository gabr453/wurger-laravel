<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'Nom_usuario' => 'Admin',
            'Email_usuario' => 'admin@test.com',
            'Password_usuario' => Hash::make('123456'),
            'rol' => 'Admin',
        ]);

        Usuario::create([
            'Nom_usuario' => 'Cliente',
            'Email_usuario' => 'cliente@test.com',
            'Password_usuario' => Hash::make('123456'),
            'rol' => 'Usuario',
        ]);
    }
}

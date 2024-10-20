<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Incripta la contraseña

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Crear 1 administrador (rol_id = 1)
    public function run(): void
    {
        // Administardor
        User::create([
            'nombres' => 'Jonathan',
            'apellidos' => 'Orrego Montoya',
            'teléfono' => '3005507198',
            'email' => 'jonathan.orrego@hotmail.com',
            'foto' => null,
            'password' => Hash::make('12345678'),
            'rol_id' => 1, // Administrador
        ]);

        User::factory(3)->count(3)->create([
            'rol_id' => 2, // Consultores
        ]);

        User::factory(10)->count(3)->create([
            'rol_id' => 3, // Usuario Comunes
        ]);
    }
}

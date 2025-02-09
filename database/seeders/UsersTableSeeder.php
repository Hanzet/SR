<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Llamamos el modelo Users
use Illuminate\Support\Facades\Hash; // Librería para incriptar la contraseña

class UsersTableSeeder extends Seeder
{

    // Crear 1 usuario administrador (rol_id = 1)
    public function run(): void
    {
        // Administardor
        User::create([
            'nombres' => 'Jonathan',
            'apellidos' => 'Orrego Montoya',
            'teléfono' => '3005507198',
            'email' => 'jonathan.orrego@hotmail.com',
            'foto' => null,
            'password' => Hash::make('12345678'), // Importamos acá la librería de Hash para incriptarla
            'rol_id' => 1, // Administrador
        ]);

        User::factory(3)->count(3)->create([ // Crea una fábrica de usuarios. Aquí el 3 indica que se están generando datos de prueba para 3 usuarios.
            'rol_id' => 2, // Consultores
        ]);

        User::factory(10)->count(3)->create([ // Indica la creación de una fábrica de usuarios (aunque el número 10 parece innecesario porque no afecta a count).
            'rol_id' => 3, // Usuario Comunes
        ]);
    }
}

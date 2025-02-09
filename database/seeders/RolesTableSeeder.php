<?php

namespace Database\Seeders;

use App\Models\Role; // Llamamos la librería Role
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // LLamamos la librería Facades DB para utilzarlo en el seeder

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            Role::Create(['name' => 'Administrador']),
            Role::Create(['name' => 'Asesor']),
            Role::Create(['name' => 'Usuario']),
        ]);
    }
}

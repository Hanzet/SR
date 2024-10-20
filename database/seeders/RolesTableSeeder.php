<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            Role::Create(['name' => 'Administrador']),
            Role::Create(['name' => 'Asesor']),
            Role::Create(['name' => 'Usuario']),
        ]);
    }
}

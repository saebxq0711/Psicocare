<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['id' => 1, 'name' => 'admin', 'description' => 'Administrador del sistema'],
            ['id' => 2, 'name' => 'psicologo', 'description' => 'Psicóloga del sistema'],
            ['id' => 3, 'name' => 'paciente', 'description' => 'Paciente del sistema'],
        ]);
    }
}


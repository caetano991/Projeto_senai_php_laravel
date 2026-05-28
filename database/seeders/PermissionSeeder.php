<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Limpa o cache do Spatie antes de começar para não dar falso positivo
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',

            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe'

        ];

        foreach ($permissions as $permission) {
            // firstOrCreate garante que vai salvar no banco se não existir
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}

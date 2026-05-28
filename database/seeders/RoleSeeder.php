<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        if (!Role::where('name', 'Super Admin')->first()) {
            Role::create([
                'name' => 'Super Admin'
            ]);
        }

        if (!Role::where('name', 'Admin')->first()) {
            $admin = Role::create([
                'name' => 'Admin',
            ]);
        }else{
            $admin = Role::where('name', 'Admin')->first();
        }
            //Dar permissão total ao admin
            $admin->givePermissionTo([
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
            ]);

        if (!Role::where('name', 'Professor')->first()){
            $teacher = Role::create([
                'name' => 'Professor'
            ]);
            }else {
            $teacher = Role::where('name', 'Professor')->first();}
        
            //Dar permissão total ao professor
            $teacher->givePermissionTo([
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
            ]);
            
        
        if (!Role::where('name', 'Tutor')->first()) {
            $tutor = Role::create([
                'name' => 'Tutor'
            ]);
        }else {
            $tutor = Role::where('name', 'Tutor')->first();
        }

            //Definir permissão do tutor
            $tutor->givePermissionTo([
                'index-course',
                'show-course',
                'edit-course',

                'index-classe',
                'show-classe',                
                'edit-classe',                
            ]);
        

        if (!Role::where('name', 'Aluno')->first()) {
            Role::create([
                'name' => 'Aluno'
            ]);
            } else {
            $aluno = Role::where('name', 'Aluno')->first();
        }

            //Definir permissão do aluno
            $aluno->givePermissionTo([
                'index-course',
                'show-course',

                'index-classe',
                'show-classe',
            ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void{
            
        // Usuário 1 
        if (!User::where('email','andrey@senai.com.br')->first()) {
            $superAdmin = User::create([
                'name' => 'Andrey',
                'email' => 'andrey@senai.com.br',
                'password' => Hash::make('senai00', ['rounds' => 12]),
                'image' => 'default.png',
            ]);

            //Atribuir o papel de Super Admin ao usuário
            $superAdmin->assignRole('Super Admin');
        }

        // Usuário 2
        if (!User::where('email', 'bruna@senai.com.br')->first()) {
            $admin = User::create([
                'name' => 'Bruna',
                'email' => 'bruna@senai.com.br',
                'password' => Hash::make('senai00', ['rounds' => 12]),
                'image' => 'default.png',       
            ]);

            //Atribuir o papel de Admin ao usuário
            $admin->assignRole('Admin');
        }

        // Usuário 3
        if (!User::where('email', 'carlos@senai.com.br')->first()) {
            $teacher = User::create([
                'name' => 'Carlos',
                'email' => 'carlos@senai.com.br',
                'password' => Hash::make('senai00', ['rounds' => 12]),
                'image' => 'default.png',   
            ]);

            //Atribuir o papel de Professor ao usuário
            $teacher->assignRole('Professor');
        }

        // Usuário 4
        if (!User::where('email', 'daniela@senai.com.br')->first()) {
            $tutor = User::create([
                'name' => 'Daniela',
                'email' => 'daniela@senai.com.br',
                'password' => Hash::make('senai00', ['rounds' => 12]),
                'image' => 'default.png',      
            ]);

            //Atribuir o papel de Tutor ao usuário
            $tutor->assignRole('Tutor');
        }

        // Usuário 5
        if (!User::where('email', 'eduardo@senai.com.br')->first()) {
            $student = User::create([
                'name' => 'Eduardo',
                'email' => 'eduardo@senai.com.br',
                'password' => Hash::make('senai00', ['rounds' => 12]),
                'image' => 'default.png',           
            ]);

            //Atribuir o papel de Aluno ao usuário
            $student->assignRole('Aluno');
        }
    }
}

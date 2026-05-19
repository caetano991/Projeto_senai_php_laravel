<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Classe::where('name', 'Aula 1')->first()) {
             Classe::create([
                'name' => 'Aula 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'course_id' => 1, // ID do curso relacionado
            ]);
        }
        
        if (!Classe::where('name', 'Aula 2')->first()) {
             Classe::create([
                'name' => 'Aula 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'course_id' => 1, // ID do curso relacionado
            ]);
        }

        if (!Classe::where('name', 'Aula 3')->first()) {
             Classe::create([
                'name' => 'Aula 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'course_id' => 2, // ID do curso relacionado
            ]);
        }
             
        if (!Classe::where('name', 'Aula 4')->first()) {
             Classe::create([
                    'name' => 'Aula 4',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'course_id' => 2, // ID do curso relacionado
            ]);
        }          

        if (!Classe::where('name', 'Aula 5')->first()) {            
             Classe::create([
                    'name' => 'Aula 5',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'course_id' => 3, // ID do curso relacionado
            ]); 
        }
    }
}

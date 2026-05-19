<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Course::where('name', 'Gastronomia - T1')->first()) {
            Course::create([
                'name' => 'Gastronomia - T1',
                'price' => '300.00',
            ]);
        }

        if (!Course::where('name', 'Gastronomia - T2')->first()) {
            Course::create([
                'name' => 'Gastronomia - T2',
                'price' => '300.00',      
            ]);
        }           

        if (!Course::where('name', 'Confeitaria - T1')->first()) {
            Course::create([
                'name' => 'Confeitaria - T1',
                'price' => '300.00',
            ]); 
        }

        if (!Course::where('name', 'Confeitaria - T2')->first()) {
            Course::create([
                'name' => 'Confeitaria - T2',
                'price' => '300.00',
            ]);
        }



    }
}

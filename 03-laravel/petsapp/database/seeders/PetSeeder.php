<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('pets')->insert([
           'name' => 'firulais',
           'kind' => 'dog',
           'weight' => 16,
           'age' => 24,
           'breed' => 'Shiba Inu',
           'location' => 'New York',
           'description' => 'Luna is a friendly and affectionate dog. She loves to play fetch and chase squirrels.',
           'created_at' => now()
       ]);

       DB::table('pets')->insert([
        'name' => 'Michi',
        'kind' => 'Cat',
        'weight' => 8,
        'age' => 18,
        'breed' => 'Persa',
        'location' => 'dubai',
        'description' => 'Michi is a gentle and affectionate cat. He loves to cuddle with his family and play fetch.',
        'created_at' => now()
       ]);

       DB::table('pets')->insert([
        'name' => 'killer',
        'kind' => 'Dog',
        'weight' => 5,
        'age' => 48,
        'breed' => 'Poodle',
        'location' => 'caracas',
        'description' => 'Killer is a playful and brave dog. He loves to chase toys and fetch treats.',
        'created_at' => now()
       ]);

    }
}


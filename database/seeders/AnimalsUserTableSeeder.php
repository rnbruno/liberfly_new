<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnimalsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals = [
            [
                'name' => 'Rex',
                'breed' => 'Labrador',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 25.5,
                'user_id' => '06db964a-29e5-40fb-a599-f36a08a7c755', // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Mia',
                'breed' => 'Persa',
                'type_animals_id' => 2, // Gato
                'age' => 2,
                'weight' => 4.2,
                'user_id' => '313395a9-0552-47f6-b2ce-b66b8da84f82', // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Polly',
                'breed' => null,
                'type_animals_id' => 3, // Pássaro
                'age' => 1,
                'weight' => 0.1,
                'user_id' => '3bbbf769-1459-4ce3-9abc-75688d5a66ea', // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bugs',
                'breed' => 'Angorá',
                'type_animals_id' => 4, // Coelho
                'age' => 4,
                'weight' => 1.5,
                'user_id' => '7c08a3db-4f10-407a-b16d-1f78a413bc74', // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nemo',
                'breed' => null,
                'type_animals_id' => 6, // Peixe
                'age' => 1,
                'weight' => 0.05,
                'user_id' => '3bbbf769-1459-4ce3-9abc-75688d5a66ea', // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('animals_user')->insert($animals);
    }
}

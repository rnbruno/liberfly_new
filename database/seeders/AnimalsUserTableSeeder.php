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
                'id_int' => 1, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Mia',
                'breed' => 'Persa',
                'type_animals_id' => 2, // Gato
                'age' => 2,
                'weight' => 4.2,
                'id_int' => 2, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Polly',
                'breed' => null,
                'type_animals_id' => 3, // Pássaro
                'age' => 1,
                'weight' => 0.1,
                'id_int' => 3, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bugs',
                'breed' => 'Angorá',
                'type_animals_id' => 4, // Coelho
                'age' => 4,
                'weight' => 1.5,
                'id_int' => 4, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nemo',
                'breed' => null,
                'type_animals_id' => 6, // Peixe
                'age' => 1,
                'weight' => 0.05,
                'id_int' => 3, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Rex',
                'breed' => 'Labrador',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 25.5,
                'id_int' => 4, // Substitua por um UUID existente
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bella',
                'breed' => 'Beagle',
                'type_animals_id' => 1, // Cachorro
                'age' => 2,
                'weight' => 18.0,
                'id_int' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Milo',
                'breed' => 'Bulldog',
                'type_animals_id' => 1, // Cachorro
                'age' => 4,
                'weight' => 22.3,
                'id_int' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Luna',
                'breed' => 'Poodle',
                'type_animals_id' => 1, // Cachorro
                'age' => 1,
                'weight' => 12.7,
                'id_int' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Charlie',
                'breed' => 'Golden Retriever',
                'type_animals_id' => 1, // Cachorro
                'age' => 5,
                'weight' => 30.2,
                'id_int' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Max',
                'breed' => 'German Shepherd',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 35.0,
                'id_int' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Rocky',
                'breed' => 'Rottweiler',
                'type_animals_id' => 1, // Cachorro
                'age' => 4,
                'weight' => 40.5,
                'id_int' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Daisy',
                'breed' => 'Shih Tzu',
                'type_animals_id' => 1, // Cachorro
                'age' => 2,
                'weight' => 10.5,
                'id_int' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bailey',
                'breed' => 'Pomeranian',
                'type_animals_id' => 1, // Cachorro
                'age' => 1,
                'weight' => 5.2,
                'id_int' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Zoe',
                'breed' => 'Yorkshire Terrier',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 6.7,
                'id_int' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Cooper',
                'breed' => 'Boxer',
                'type_animals_id' => 1, // Cachorro
                'age' => 5,
                'weight' => 28.5,
                'id_int' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Maggie',
                'breed' => 'Dachshund',
                'type_animals_id' => 1, // Cachorro
                'age' => 2,
                'weight' => 9.3,
                'id_int' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sadie',
                'breed' => 'Cocker Spaniel',
                'type_animals_id' => 1, // Cachorro
                'age' => 4,
                'weight' => 14.2,
                'id_int' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Toby',
                'breed' => 'Border Collie',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 20.7,
                'id_int' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Oscar',
                'breed' => 'Dalmatian',
                'type_animals_id' => 1, // Cachorro
                'age' => 5,
                'weight' => 27.5,
                'id_int' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Lily',
                'breed' => 'Chihuahua',
                'type_animals_id' => 1, // Cachorro
                'age' => 2,
                'weight' => 4.0,
                'id_int' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Lucy',
                'breed' => 'Schnauzer',
                'type_animals_id' => 1, // Cachorro
                'age' => 3,
                'weight' => 15.4,
                'id_int' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('animals_user')->insert($animals);
    }
}

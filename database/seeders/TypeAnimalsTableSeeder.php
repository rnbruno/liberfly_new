<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_animals')->insert([
            ['type_name' => 'Cachorro', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Gato', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Pássaro', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Coelho', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Hamster', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Peixe', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Tartaruga', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Réptil', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Cavalo', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'Furão', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

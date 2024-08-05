<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MedicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medications')->insert([
            ['name' => 'Antibiotic A', 'description' => 'Antibiotic used for infections.', 'price' => 29.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pain Relief B', 'description' => 'Pain relief medication for pets.', 'price' => 15.49, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flea Treatment C', 'description' => 'Treatment for fleas and ticks.', 'price' => 22.75, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wormer D', 'description' => 'Medication for worm infestations.', 'price' => 18.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vaccine E', 'description' => 'Vaccine for common diseases.', 'price' => 45.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Allergy Medication F', 'description' => 'Medication for pet allergies.', 'price' => 25.50, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anti-inflammatory G', 'description' => 'Anti-inflammatory for joint pain.', 'price' => 30.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antiparasitic H', 'description' => 'Medication to treat parasites.', 'price' => 20.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Heartworm Preventive I', 'description' => 'Preventive medication for heartworm.', 'price' => 35.75, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eye Drops J', 'description' => 'Eye drops for pet eye care.', 'price' => 12.99, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

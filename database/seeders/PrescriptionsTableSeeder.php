<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescriptions')->insert([
            [
                'marcacoes_id' => 1, // Substitua por um ID válido de 'marcacoes'
                'medication_id' => 1, // Substitua por um ID válido de 'medications'
                'dosage' => '500mg',
                'frequency' => 'Twice a day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marcacoes_id' => 2, // Substitua por um ID válido de 'marcacoes'
                'medication_id' => 2, // Substitua por um ID válido de 'medications'
                'dosage' => '1 tablet',
                'frequency' => 'Once a day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marcacoes_id' => 3, // Substitua por um ID válido de 'marcacoes'
                'medication_id' => 3, // Substitua por um ID válido de 'medications'
                'dosage' => '200mg',
                'frequency' => 'Three times a day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marcacoes_id' => 4, // Substitua por um ID válido de 'marcacoes'
                'medication_id' => 4, // Substitua por um ID válido de 'medications'
                'dosage' => '50mg',
                'frequency' => 'Once a week',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marcacoes_id' => 5, // Substitua por um ID válido de 'marcacoes'
                'medication_id' => 5, // Substitua por um ID válido de 'medications'
                'dosage' => '10ml',
                'frequency' => 'Twice a day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

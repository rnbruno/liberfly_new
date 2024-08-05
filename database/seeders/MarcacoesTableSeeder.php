<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcacoes')->insert([
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 1, // Substitua por um ID válido de 'medical'
                'marcacao_date' => '2024-08-02 09:00:00',
                'reason' => 'Check-up anual',
                'notes' => 'Exame geral e vacinação.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 12, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 2, // Substitua por um ID válido de 'medical'
                'marcacao_date' => '2024-08-03 10:30:00',
                'reason' => 'Vacinação',
                'notes' => 'Vacinação contra raiva.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 3, // Substitua por um ID válido de 'medical'
                'marcacao_date' => '2024-08-04 11:00:00',
                'reason' => 'Consulta de emergência',
                'notes' => 'Dificuldade para respirar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 13, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 4, // Substitua por um ID válido de 'medical'
                'marcacao_date' => '2024-08-05 12:00:00',
                'reason' => 'Exame de sangue',
                'notes' => 'Amostra de sangue para análise.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 5, // Substitua por um ID válido de 'medical'
                'marcacao_date' => '2024-08-06 14:00:00',
                'reason' => 'Consulta de rotina',
                'notes' => 'Avaliação de saúde geral.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

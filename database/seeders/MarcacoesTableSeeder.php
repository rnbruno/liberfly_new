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
                'reason' => 'Check-up anual',
                'notes' => 'Exame geral e vacinação.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 12, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 2, // Substitua por um ID válido de 'medical'
                'reason' => 'Vacinação',
                'notes' => 'Vacinação contra raiva.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 3, // Substitua por um ID válido de 'medical'
                'reason' => 'Consulta de emergência',
                'notes' => 'Dificuldade para respirar.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 13, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 4, // Substitua por um ID válido de 'medical'
                'reason' => 'Exame de sangue',
                'notes' => 'Amostra de sangue para análise.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 5, // Substitua por um ID válido de 'medical'
                'reason' => 'Consulta de rotina',
                'notes' => 'Avaliação de saúde geral.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 11, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 1, // Substitua por um ID válido de 'medical'
                'reason' => 'Check-up anual',
                'notes' => 'Exame geral e vacinação.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 12, // Substitua por um ID válido de 'animals_user'
                'medical_id' => 2, // Substitua por um ID válido de 'medical'
                'reason' => 'Vacinação',
                'notes' => 'Vacinação contra raiva.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 13,
                'medical_id' => 3,
                'reason' => 'Consulta de emergência',
                'notes' => 'Febre e falta de apetite.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 14,
                'medical_id' => 1,
                'reason' => 'Exame de sangue',
                'notes' => 'Coleta de sangue para exames laboratoriais.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 15,
                'medical_id' => 4,
                'reason' => 'Consulta dermatológica',
                'notes' => 'Alergia na pele.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 16,
                'medical_id' => 5,
                'reason' => 'Cirurgia de castração',
                'notes' => 'Procedimento cirúrgico agendado.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 17,
                'medical_id' => 2,
                'reason' => 'Vacinação',
                'notes' => 'Vacinação anual contra leptospirose.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 18,
                'medical_id' => 3,
                'reason' => 'Consulta oftalmológica',
                'notes' => 'Exame de vista e tratamento para conjuntivite.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 19,
                'medical_id' => 1,
                'reason' => 'Check-up anual',
                'notes' => 'Exame geral e atualização de vacinas.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 20,
                'medical_id' => 4,
                'reason' => 'Consulta ortopédica',
                'notes' => 'Dor nas articulações.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 21,
                'medical_id' => 5,
                'reason' => 'Cirurgia de castração',
                'notes' => 'Procedimento cirúrgico agendado.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 22,
                'medical_id' => 2,
                'reason' => 'Vacinação',
                'notes' => 'Vacinação anual contra hepatite.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 21,
                'medical_id' => 3,
                'reason' => 'Consulta de emergência',
                'notes' => 'Vômito e diarreia.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 18,
                'medical_id' => 1,
                'reason' => 'Exame de sangue',
                'notes' => 'Coleta de sangue para exames de rotina.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 17,
                'medical_id' => 4,
                'reason' => 'Consulta dermatológica',
                'notes' => 'Tratamento para dermatite.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 18,
                'medical_id' => 5,
                'reason' => 'Cirurgia de castração',
                'notes' => 'Procedimento cirúrgico agendado.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 21,
                'medical_id' => 2,
                'reason' => 'Vacinação',
                'notes' => 'Vacinação anual contra parvovirose.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 14,
                'medical_id' => 3,
                'reason' => 'Consulta oftalmológica',
                'notes' => 'Tratamento para glaucoma.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 15,
                'medical_id' => 1,
                'reason' => 'Check-up anual',
                'notes' => 'Exame geral e atualização de vacinas.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animals_user_id' => 21,
                'medical_id' => 4,
                'reason' => 'Consulta ortopédica',
                'notes' => 'Avaliação de displasia coxofemoral.',
                'excluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

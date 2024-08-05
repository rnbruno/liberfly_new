<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HorariosDisponiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            ['data' => '2024-08-10', 'hora_inicio' => '08:00:00', 'hora_fim' => '08:30:00'],
            ['data' => '2024-08-10', 'hora_inicio' => '08:30:00', 'hora_fim' => '09:00:00'],
            ['data' => '2024-08-10', 'hora_inicio' => '10:00:00', 'hora_fim' => '11:00:00'],
            ['data' => '2024-08-10', 'hora_inicio' => '14:30:00', 'hora_fim' => '15:00:00'],
            ['data' => '2024-08-10', 'hora_inicio' => '15:00:00', 'hora_fim' => '15:30:00'],

            ['data' => '2024-08-11', 'hora_inicio' => '08:00:00', 'hora_fim' => '08:30:00'],
            ['data' => '2024-08-11', 'hora_inicio' => '09:00:00', 'hora_fim' => '09:30:00'],
            ['data' => '2024-08-11', 'hora_inicio' => '10:00:00', 'hora_fim' => '10:30:00'],
            ['data' => '2024-08-11', 'hora_inicio' => '15:00:00', 'hora_fim' => '15:30:00'],
            ['data' => '2024-08-11', 'hora_inicio' => '15:30:00', 'hora_fim' => '16:00:00'],

            ['data' => '2024-08-12', 'hora_inicio' => '10:00:00', 'hora_fim' => '10:30:00'],
        ];

        foreach ($horarios as $horario) {
            DB::table('horarios_disponiveis')->insert([
                'data' => $horario['data'],
                'hora_inicio' => $horario['hora_inicio'],
                'hora_fim' => $horario['hora_fim'],
                'disponivel' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

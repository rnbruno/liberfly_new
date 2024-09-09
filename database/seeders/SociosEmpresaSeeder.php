<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Empresa;
use App\Models\SocioEmpresa;
use App\Enums\InativoGeral;

class SociosEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            # code...
            // Suponha que você já tenha usuários no banco de dados
            $users = User::all(); // Obtenha todos os usuários
            $randomUser = $users->random(); // Pegue um usuário aleatório
            $empresas = Empresa::all(); // Obtenha todos os usuários
            $randomEmpresas = $empresas->random(); // Pegue um usuário aleatório
            $nomes = array_column(InativoGeral::cases(), 'name');
            // Escolhe uma chave aleatória
            $chaveAleatoria = array_rand($nomes);
            // Pega o valor correspondente à chave aleatória
            $nomeAleatorio = $nomes[$chaveAleatoria];
            // Salvar o hash da chave no banco
            SocioEmpresa::create([
                'empresas_id' => $randomEmpresas->empresas_id,
                'user_id' => $randomUser->id_int,
                'status' => $nomeAleatorio,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $empresas = [];
        $users = User::where('type_user', '5')->get();
        foreach ($users as $key => $user) {
            $empresas[] = [
                'id' => (string) Str::uuid(),
                'empresas_id' => $i,
                'user_id' => $user->id_int,
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'phone' => $faker->phoneNumber,
                'endereco_empresa' => $key,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('empresas')->insert($empresas);
    }
}

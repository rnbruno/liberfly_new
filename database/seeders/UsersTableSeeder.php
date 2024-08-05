<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => Str::uuid(),
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'email_verified_at' => now(),
                'phone' => '123-456-7890',
                'type_user' => 1,
                'password' => bcrypt('password'), // Use bcrypt to hash the password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'email_verified_at' => now(),
                'phone' => '987-654-3210',
                'type_user' => 2,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => Str::uuid(),
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'email_verified_at' => now(),
                'phone' => '555-666-7777',
                'type_user' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Bob Brown',
                'email' => 'bob@example.com',
                'email_verified_at' => now(),
                'phone' => '444-555-6666',
                'type_user' => 3,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Carol White',
                'email' => 'carol@example.com',
                'email_verified_at' => now(),
                'phone' => '333-444-5555',
                'type_user' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'David Green',
                'email' => 'david@example.com',
                'email_verified_at' => now(),
                'phone' => '222-333-4444',
                'type_user' => 2,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Emma Davis',
                'email' => 'emma@example.com',
                'email_verified_at' => now(),
                'phone' => '111-222-3333',
                'type_user' => 3,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Frank Miller',
                'email' => 'frank@example.com',
                'email_verified_at' => now(),
                'phone' => '999-888-7777',
                'type_user' => 2,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Grace Wilson',
                'email' => 'grace@example.com',
                'email_verified_at' => now(),
                'phone' => '888-777-6666',
                'type_user' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Henry Moore',
                'email' => 'henry@example.com',
                'email_verified_at' => now(),
                'phone' => '777-666-5555',
                'type_user' => 2,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Irene Taylor',
                'email' => 'irene@example.com',
                'email_verified_at' => now(),
                'phone' => '666-555-4444',
                'type_user' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Adicione mais usuários conforme necessário
        ];

        DB::table('users')->insert($users);
    }
}

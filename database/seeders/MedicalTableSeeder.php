<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medical')->insert([
            [
                'name' => 'Dr. Alice Smith',
                'specialty' => 'dog',
                'phone' => '123-456-7890',
                'email' => 'alice@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Bob Johnson',
                'specialty' => 'cat',
                'phone' => '987-654-3210',
                'email' => 'bob@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Carol Williams',
                'specialty' => 'bird',
                'phone' => '555-666-7777',
                'email' => 'carol@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. David Brown',
                'specialty' => 'rabbit',
                'phone' => '444-555-6666',
                'email' => 'david@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Emma Davis',
                'specialty' => 'reptile',
                'phone' => '333-444-5555',
                'email' => 'emma@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Frank Miller',
                'specialty' => 'fish',
                'phone' => '222-333-4444',
                'email' => 'frank@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Grace Wilson',
                'specialty' => 'dog',
                'phone' => '111-222-3333',
                'email' => 'grace@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Henry Moore',
                'specialty' => 'cat',
                'phone' => '999-888-7777',
                'email' => 'henry@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Irene Taylor',
                'specialty' => 'bird',
                'phone' => '888-777-6666',
                'email' => 'irene@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Jack Anderson',
                'specialty' => 'rabbit',
                'phone' => '777-666-5555',
                'email' => 'jack@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

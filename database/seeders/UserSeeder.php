<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([

            'name' =>
                'Admin ScholarHub',

            'email' =>
                'admin@scholarhub.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'ADMIN',

            'is_blocked' =>
                false,
        ]);

        User::create([

            'name' =>
                'Mentor One',

            'email' =>
                'mentor@scholarhub.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'MENTOR',

            'is_blocked' =>
                false,
        ]);

        User::create([

            'name' =>
                'Student One',

            'email' =>
                'student@scholarhub.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'STUDENT',

            'is_blocked' =>
                false,
        ]);
    }
}
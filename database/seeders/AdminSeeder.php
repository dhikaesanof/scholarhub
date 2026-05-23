<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([

            'name' =>
                'Admin Test',

            'email' =>
                'admin@test.com',

            'password' =>
                bcrypt('password'),

            'role' =>
                'ADMIN',
        ]);

        Admin::create([

            'user_id' =>
                $user->id,

            'full_name' =>
                'Admin Test',
        ]);
    }
}
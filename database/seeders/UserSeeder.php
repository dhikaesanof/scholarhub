<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Models\Admin;

use App\Models\Student;

use App\Models\Mentor;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // ADMIN
        // =========================

        $adminUser = User::create([

            'name' =>
                'Admin ScholarHub',

            'email' =>
                'admin@test.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'ADMIN',
        ]);

        Admin::create([

            'user_id' =>
                $adminUser->id,
            'full_name' =>
                'Admin ScholarHub',
        ]);

        // =========================
        // MENTOR 1
        // =========================

        $mentor1 = User::create([

            'name' =>
                'Budi Santoso',

            'email' =>
                'mentor1@test.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'MENTOR',

            'profile_photo' =>
                'https://i.pinimg.com/1200x/e8/09/8a/e8098a3d487b4fd7b8d591d7d9db32bb.jpg',
        ]);

        Mentor::create([

            'user_id' =>
                $mentor1->id,

            'specialization' =>
                'LPDP & Essay Mentor',

            'bio' =>
                'Experienced scholarship mentor helping students prepare essays and interviews.',

            'university' =>
                'Universitas Indonesia',

            'major' =>
                'Computer Science',

            'telegram_link' =>
                'https://t.me/budisantoso',

            'gmeet_link' =>
                'https://meet.google.com/example1',

            'instagram_username' =>
                'budischolar',
        ]);

        // =========================
        // MENTOR 2
        // =========================

        $mentor2 = User::create([

            'name' =>
                'Citra Maharani',

            'email' =>
                'mentor2@test.com',

            'password' =>
                Hash::make('password'),

            'role' =>
                'MENTOR',

            'profile_photo' =>
                'https://images.unsplash.com/photo-1591655694472-cc751117d95f?q=80&w=2655&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Mentor::create([

            'user_id' =>
                $mentor2->id,

            'specialization' =>
                'MEXT & Interview Mentor',

            'university' =>
                'Institut Teknologi Bandung',

            'major' =>
                'Information Systems',

            'bio' =>
                'Helping students achieve international scholarship opportunities.',

            'telegram_link' =>
                'https://t.me/citramaharani',

            'gmeet_link' =>
                'https://meet.google.com/example2',

            'instagram_username' =>
                'citrascholar',
        ]);

        // =========================
        // STUDENT 1
        // =========================

        $student1 = User::create([

            'name' =>
                'Ahmad Rizki',

            'email' =>
                'dhikaesanof@student.ub.ac.id',

            'password' =>
                Hash::make('password'),

            'role' =>
                'STUDENT',
        ]);

        Student::create([

            'user_id' =>
                $student1->id,

            'university' =>
                'Universitas Indonesia',

            'major' =>
                'Computer Science',

            'semester' =>
                6,
        ]);

        // =========================
        // STUDENT 2
        // =========================

        $student2 = User::create([

            'name' =>
                'Dewi Lestari',

            'email' =>
                'fajarokta@student.ub.ac.id',

            'password' =>
                Hash::make('password'),

            'role' =>
                'STUDENT',
        ]);

        Student::create([

            'user_id' =>
                $student2->id,

            'university' =>
                'Institut Teknologi Bandung',

            'major' =>
                'Information Systems',

            'semester' =>
                4,
        ]);
    }
}
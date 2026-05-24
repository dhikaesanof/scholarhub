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
                'student1@test.com',

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
                'student2@test.com',

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
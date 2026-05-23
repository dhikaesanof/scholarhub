<?php

namespace Database\Seeders;

use App\Models\Student;

use App\Models\User;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $studentUser =

            User::where(
                'role',
                'STUDENT'
            )->first();

        Student::create([

            'user_id' =>
                $studentUser->id,

            'university' =>
                'Universitas Indonesia',

            'major' =>
                'Information Systems',

            'semester' =>
                6,
        ]);
    }
}
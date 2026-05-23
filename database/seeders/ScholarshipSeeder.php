<?php

namespace Database\Seeders;

use App\Models\Scholarship;

use App\Models\User;

use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $admin =

            User::where(
                'role',
                'ADMIN'
            )->first();

        Scholarship::create([

            'title' =>
                'LPDP Scholarship 2026',

            'provider' =>
                'LPDP',

            'description' =>
                'Fully funded master and doctoral scholarship by Indonesian government.',

            'requirements' =>
                'Minimum GPA 3.25',

            'education_level' =>
                'Master',

            'category' =>
                'Government',

            'funding_type' =>
                'Fully Funded',

            'deadline' =>
                now()->addMonths(2),

            'registration_link' =>
                'https://lpdp.kemenkeu.go.id',

            'thumbnail' =>
                null,

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee, living allowance, airfare',

            'minimum_gpa' =>
                3.25,

            'required_documents' =>
                'CV, Essay, Transcript',

            'registration_open_date' =>
                now(),

            'announcement_date' =>
                now()->addMonths(3),
        ]);

        Scholarship::create([

            'title' =>
                'Chevening Scholarship',

            'provider' =>
                'UK Government',

            'description' =>
                'UK fully funded scholarship for future leaders.',

            'requirements' =>
                'Leadership experience',

            'education_level' =>
                'Master',

            'category' =>
                'International',

            'funding_type' =>
                'Fully Funded',

            'deadline' =>
                now()->addMonths(1),

            'registration_link' =>
                'https://www.chevening.org',

            'thumbnail' =>
                null,

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Full tuition, visa, monthly stipend',

            'minimum_gpa' =>
                3.00,

            'required_documents' =>
                'Essay, Recommendation Letter',

            'registration_open_date' =>
                now(),

            'announcement_date' =>
                now()->addMonths(2),
        ]);

        Scholarship::create([

            'title' =>
                'MEXT Scholarship',

            'provider' =>
                'Japanese Government',

            'description' =>
                'Scholarship program for international students in Japan.',

            'requirements' =>
                'Strong academic record',

            'education_level' =>
                'Bachelor',

            'category' =>
                'Government',

            'funding_type' =>
                'Fully Funded',

            'deadline' =>
                now()->addWeeks(3),

            'registration_link' =>
                'https://www.studyinjapan.go.jp',

            'thumbnail' =>
                null,

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee, stipend, accommodation',

            'minimum_gpa' =>
                3.20,

            'required_documents' =>
                'Passport, Essay, Transcript',

            'registration_open_date' =>
                now(),

            'announcement_date' =>
                now()->addMonths(4),
        ]);
    }
}
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

            'created_by' => \App\Models\Admin::first()->id,

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

        // BEASISWA UNGGULAN

        Scholarship::create([

            'title' =>
                'Beasiswa Unggulan',

            'provider' =>
                'Kemendikbud RI',

            'description' =>
                'Scholarship program from Indonesian government for high-achieving students.',

            'requirements' =>
                'Excellent academic achievement and active organizational experience.',

            'education_level' =>
                'Bachelor',

            'category' =>
                'Government',

            'funding_type' =>
                'Full Funded',

            'deadline' =>
                now()->addMonths(3),

            'registration_link' =>
                'https://beasiswaunggulan.kemdikbud.go.id',

            'thumbnail' =>
                'scholarships/bu.jpg',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee and living allowance.',

            'minimum_gpa' =>
                3.25,

            'required_documents' =>
                'CV, Essay, Certificate, Transcript',

            'registration_open_date' =>
                now(),

            'announcement_date' =>
                now()->addMonths(5),
        ]);

        // TANOTO

        Scholarship::create([

            'title' =>
                'Tanoto Foundation Scholarship',

            'provider' =>
                'Tanoto Foundation',

            'description' =>
                'Leadership and scholarship development program for outstanding Indonesian students.',

            'requirements' =>
                'Active undergraduate student with strong leadership and academic commitment.',

            'education_level' =>
                'Bachelor',

            'category' =>
                'Academic',

            'funding_type' =>
                'Full Funded',

            'deadline' =>
                now()->addMonths(2),

            'registration_link' =>
                'https://www.tanotofoundation.org',

            'thumbnail' =>
                'scholarships/tanoto.jpg',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition support, leadership training, networking opportunities.',

            'minimum_gpa' =>
                3.00,

            'required_documents' =>
                'CV, Transcript, Essay, Recommendation Letter',

            'registration_open_date' =>
                now(),

            'announcement_date' =>
                now()->addMonths(4),
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use App\Models\User;

class AdditionalScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where(
            'role',
            'ADMIN'
        )->first();

        // =====================
        // OPENING SOON
        // =====================

        Scholarship::create([

            'title' =>
                'LPDP 2026',

            'provider' =>
                'LPDP Indonesia',

            'description' =>
                'Scholarship opening soon.',

            'requirements' =>
                'Minimum GPA 3.25',

            'education_level' =>
                'Master',

            'category' =>
                'Government',

            'funding_type' =>
                'Full Funded',

            'registration_open_date' =>
                now()->addDays(2),

            'deadline' =>
                now()->addDays(30),

            'announcement_date' =>
                now()->addDays(60),

            'registration_link' =>
                'https://lpdp.kemenkeu.go.id',

            'thumbnail' =>
                'scholarships/lpdp.jpg',

            'status' =>
                'COMING_SOON',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Full tuition and allowance.',

            'minimum_gpa' =>
                3.25,

            'required_documents' =>
                'CV, Essay, Transcript',
        ]);

        // =====================
        // CLOSING SOON
        // =====================

        Scholarship::create([

            'title' =>
                'Chevening Scholarship',

            'provider' =>
                'UK Government',

            'description' =>
                'Scholarship closing soon.',

            'requirements' =>
                'Leadership experience required.',

            'education_level' =>
                'Master',

            'category' =>
                'International',

            'funding_type' =>
                'Full Funded',

            'registration_open_date' =>
                now()->subDays(20),

            'deadline' =>
                now()->addDays(2),

            'announcement_date' =>
                now()->addDays(90),

            'registration_link' =>
                'https://www.chevening.org',

            'thumbnail' =>
                'scholarships/chevening.jpg',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition and living expenses.',

            'minimum_gpa' =>
                3.5,

            'required_documents' =>
                'Essay, IELTS, Recommendation Letter',
        ]);
    }
}
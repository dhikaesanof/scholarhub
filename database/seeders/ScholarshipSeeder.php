<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where(
            'role',
            'ADMIN'
        )->first();

        // =====================
        // COMING SOON
        // =====================

        Scholarship::create([

            'title' =>
                'LPDP Scholarship 2026',

            'provider' =>
                'LPDP Indonesia',

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
                now()->addDays(30),

            'registration_link' =>
                'https://lpdp.kemenkeu.go.id',

            'thumbnail' =>
                'https://lpdp.kemenkeu.go.id/storage/beasiswa/pendaftaran-penjadwalan/pendaftaran/logo_1724300953.png',

            'status' =>
                'COMING_SOON',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee, living allowance, airfare',

            'minimum_gpa' =>
                3.25,

            'required_documents' =>
                'CV, Essay, Transcript',

            'registration_open_date' =>
                now()->addDays(2),

            'announcement_date' =>
                now()->addDays(60),
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
                'Global scholarship program for future leaders to study in the United Kingdom.',

            'requirements' =>
                'Leadership experience and strong academic background.',

            'education_level' =>
                'Master',

            'category' =>
                'International',

            'funding_type' =>
                'Fully Funded',

            'deadline' =>
                now()->addDays(3),

            'registration_link' =>
                'https://www.chevening.org',

            'thumbnail' =>
                'https://blog.kobieducation.com/wp-content/uploads/2024/06/Logo-Chevening-Scholarship.webp',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee, accommodation, airfare, monthly allowance',

            'minimum_gpa' =>
                3.50,

            'required_documents' =>
                'Essay, IELTS, Recommendation Letter',

            'registration_open_date' =>
                now()->subDays(20),

            'announcement_date' =>
                now()->addDays(90),
        ]);

        // =====================
        // NORMAL OPEN
        // =====================

        Scholarship::create([

            'title' =>
                'Tanoto Foundation Scholarship',

            'provider' =>
                'Tanoto Foundation',

            'description' =>
                'Leadership and scholarship development program for outstanding Indonesian students.',

            'requirements' =>
                'Active undergraduate student with leadership and academic commitment.',

            'education_level' =>
                'Bachelor',

            'category' =>
                'Academic',

            'funding_type' =>
                'Fully Funded',

            'deadline' =>
                now()->addMonths(2),

            'registration_link' =>
                'https://www.tanotofoundation.org',

            'thumbnail' =>
                'https://cdn.sejutacita.id/dealls-blog-cms/1_ezgif_com_jpg_to_webp_converter_50153da547.webp',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition support, leadership training, networking opportunities',

            'minimum_gpa' =>
                3.00,

            'required_documents' =>
                'CV, Transcript, Essay, Recommendation Letter',

            'registration_open_date' =>
                now()->subDays(10),

            'announcement_date' =>
                now()->addMonths(4),
        ]);

        // =====================
        // GOVERNMENT OPEN
        // =====================

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
                'Fully Funded',

            'deadline' =>
                now()->addMonths(1),

            'registration_link' =>
                'https://beasiswaunggulan.kemdikbud.go.id',

            'thumbnail' =>
                'https://cdn1-production-images-kly.akamaized.net/3SJrVamozYduvTKtqSOgqdJLXVw=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1000052/original/097346900_1443162687-tut_wuri.jpg',

            'status' =>
                'OPEN',

            'created_by' =>
                $admin->id,

            'benefits' =>
                'Tuition fee and living allowance',

            'minimum_gpa' =>
                3.25,

            'required_documents' =>
                'CV, Essay, Certificate, Transcript',

            'registration_open_date' =>
                now()->subDays(7),

            'announcement_date' =>
                now()->addMonths(3),
        ]);
    }
}
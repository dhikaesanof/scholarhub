<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Document;

use App\Models\Admin;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $admin =
            Admin::first();

        // =========================
        // DOCUMENT 1
        // =========================

        Document::create([

            'title' =>
                'Scholarship Essay Guide',

            'description' =>
                'Comprehensive guide for writing winning scholarship essays.',

            'pdf_file' =>
                'documents/essay-guide.pdf',

            'thumbnail' =>
                'https://i1.rgstatic.net/publication/355357600_Penulisan_Esai_Akademik_dan_Strategi_untuk_Lolos_Konferensi_Internasional/links/616bf939039ba2684452191d/largepreview.png',

            'price' =>
                49000,

            'created_by' =>
                $admin->id,
        ]);

        // =========================
        // DOCUMENT 2
        // =========================

        Document::create([

            'title' =>
                'Scholarship CV Template',

            'description' =>
                'Professional CV template specifically designed for scholarship applications.',

            'pdf_file' =>
                'documents/essay-guide.pdf',

            'thumbnail' =>
                'https://www.cvtemplate.co.uk/_next/static/media/cv-template-simple.b83ef691.png',

            'price' =>
                39000,

            'created_by' =>
                $admin->id,
        ]);

        // =========================
        // DOCUMENT 3
        // =========================

        Document::create([

            'title' =>
                'Interview Preparation Handbook',

            'description' =>
                'Prepare for scholarship interviews with common questions and strategies.',

            'pdf_file' =>
                'documents/essay-guide.pdf',

            'thumbnail' =>
                'https://m.media-amazon.com/images/I/61s36PkBdTL._AC_UF1000,1000_QL80_.jpg',

            'price' =>
                59000,

            'created_by' =>
                $admin->id,
        ]);
    }
}
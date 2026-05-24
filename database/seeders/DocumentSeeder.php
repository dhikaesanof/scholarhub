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
                'documents/essay-guide.jpg',

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
                'documents/cv-template.pdf',

            'thumbnail' =>
                'documents/cv-template.jpg',

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
                'documents/interview-guide.pdf',

            'thumbnail' =>
                'documents/interview-guide.jpg',

            'price' =>
                59000,

            'created_by' =>
                $admin->id,
        ]);
    }
}
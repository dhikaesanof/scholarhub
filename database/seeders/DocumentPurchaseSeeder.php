<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DocumentPurchase;

use App\Models\Document;

use App\Models\Student;

class DocumentPurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $students =
            Student::all();

        $documents =
            Document::all();

        // =========================
        // 5 DUMMY PURCHASES
        // =========================

        for ($i = 0; $i < 5; $i++) {

            $document =
                $documents->random();

            DocumentPurchase::create([

                'student_id' =>

                    $students->random()->id,

                'document_id' =>

                    $document->id,

                'payment_status' =>

                    collect([
                        'PENDING',
                        'PAID'
                    ])->random(),
            ]);
        }
    }
}
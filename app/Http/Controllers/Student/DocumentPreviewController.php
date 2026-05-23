<?php

namespace App\Http\Controllers\Student;

use App\Models\Document;
use App\Models\DocumentPurchase;

class DocumentPreviewController
{
    public function stream($id)
    {
        $student =
            auth()->user()->student;

        $purchase =

            \App\Models\DocumentPurchase::where(

                'student_id',

                $student->id

            )

            ->where(

                'document_id',

                $id

            )

            ->where(

                'payment_status',

                'PAID'

            )

            ->first();

        // BLOCK ACCESS

        if (!$purchase) {

            abort(403);
        }

        $document =
            \App\Models\Document::findOrFail($id);

        $path = storage_path(

            'app/public/' .

            $document->pdf_file
        );

        return response()->file($path);
    }

    public function __invoke($id)
    {
        $student =
            auth()->user()->student;

        $purchase =

            DocumentPurchase::where(

                'student_id',

                $student->id

            )

            ->where(

                'document_id',

                $id

            )

            ->where(

                'payment_status',

                'PAID'

            )

            ->first();

        // BLOCK ACCESS

        if (!$purchase) {

            abort(403);
        }

        $document =
            Document::findOrFail($id);

        return view(

            'student.document-preview',

            [

                'document' =>
                    $document,
            ]
        );
    }
}
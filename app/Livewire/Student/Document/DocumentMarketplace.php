<?php

namespace App\Livewire\Student\Document;

use App\Models\Document;
use App\Models\DocumentPurchase;
use Livewire\Component;

class DocumentMarketplace extends Component
{
    public function purchase($documentId)
    {
        if (!auth()->check()) {

            return redirect('/login');
        }

        $student =
            auth()->user()?->student;

        $alreadyPurchased =

            DocumentPurchase::where(

                'student_id',

                $student->id

            )

            ->where(

                'document_id',

                $documentId

            )

            ->exists();

        if ($alreadyPurchased) {

            return;
        }

        DocumentPurchase::create([

            'student_id' =>
                $student->id,

            'document_id' =>
                $documentId,

            'payment_status' =>
                'PAID',
        ]);

        session()->flash(

            'success',

            'Document purchased successfully.'
        );
    }

    public function render()
    {
        $student =
            auth()->user()?->student;

        $purchasedIds = [];

            if ($student) {

                $purchasedIds =

                    DocumentPurchase::where(

                        'student_id',

                        $student->id

                    )

                    ->where(

                        'payment_status',

                        'PAID'

                    )

                    ->pluck(
                        'document_id'
                    )

                    ->toArray();
            }

        return view(

            'livewire.student.document.document-marketplace',

            [

                'documents' =>

                    Document::latest()
                        ->get(),

                'purchasedIds' =>
                    $purchasedIds,
            ]

        )->layout(auth()->check()

            ? 'layouts.student'

            : 'layouts.public');
    }
}
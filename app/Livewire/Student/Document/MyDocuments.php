<?php

namespace App\Livewire\Student\Document;

use App\Models\DocumentPurchase;
use Livewire\Component;

class MyDocuments extends Component
{
    public function render()
    {
        $student =
            auth()->user()->student;

        $purchases =

            DocumentPurchase::with(
                'document'
            )

            ->where(

                'student_id',

                $student->id

            )

            ->where(

                'payment_status',

                'PAID'

            )

            ->latest()

            ->get();

        return view(

            'livewire.student.document.my-documents',

            [

                'purchases' =>
                    $purchases,
            ]

        )->layout(
            'layouts.student'
        );
    }
}
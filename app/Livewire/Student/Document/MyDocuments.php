<?php

namespace App\Livewire\Student\Document;

use App\Models\DocumentPurchase;
use Livewire\Component;

class MyDocuments extends Component
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_PAID = 'PAID';
    const STATUS_CANCELLED = 'CANCELLED';

    public function cancelPurchase($purchaseId)
    {
        $purchase =
            DocumentPurchase::where(
                'student_id',
                auth()->user()->student->id
            )->findOrFail(
                $purchaseId
            );

        $purchase->update([

            'payment_status' =>
                self::STATUS_CANCELLED,
        ]);

        session()->flash(
            'success',
            'Purchase cancelled.'
        );
    }

    public function continuePayment($purchaseId)
    {
        $purchase =
            DocumentPurchase::where(
                'student_id',
                auth()->user()->student->id
            )->findOrFail(
                $purchaseId
            );

        return redirect(
            '/student/document-payments/' .
            $purchase->id
        );
    }

    public function render()
    {
        $student =
            auth()->user()->student;

        $purchases =
            DocumentPurchase::with('document')
                ->where(
                    'student_id',
                    $student->id
                )
                ->whereIn(
                    'payment_status',
                    [
                        self::STATUS_PAID,
                        self::STATUS_PENDING,
                    ]
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

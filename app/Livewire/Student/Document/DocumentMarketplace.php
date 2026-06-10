<?php

namespace App\Livewire\Student\Document;

use App\Models\Document;
use App\Models\DocumentPurchase;
use Livewire\Component;

class DocumentMarketplace extends Component
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_PAID = 'PAID';
    const STATUS_CANCELLED = 'CANCELLED';

    public function purchase($documentId)
    {
        if (!auth()->check()) {

            return redirect('/login');
        }

        $student =
            auth()->user()?->student;

        $existingPurchase =
            DocumentPurchase::where(
                'student_id',
                $student->id
            )
            ->where(
                'document_id',
                $documentId
            )
            ->whereIn(
                'payment_status',
                [
                    self::STATUS_PENDING,
                    self::STATUS_PAID,
                ]
            )
            ->latest()
            ->first();

        if ($existingPurchase) {

            if ($existingPurchase->payment_status === self::STATUS_PAID) {

                return redirect()->route(
                    'student.documents.preview',
                    $documentId
                );
            }

            return redirect(
                '/student/document-payments/' .
                $existingPurchase->id
            );
        }

        $purchase =
            DocumentPurchase::create([

                'student_id' =>
                    $student->id,

                'document_id' =>
                    $documentId,

                'payment_status' =>
                    self::STATUS_PENDING,
            ]);

        return redirect(
            '/student/document-payments/' .
            $purchase->id
        );
    }

    public function render()
    {
        $student =
            auth()->user()?->student;

        $purchaseStatuses = [];

        if ($student) {

            $purchaseStatuses =
                DocumentPurchase::where(
                    'student_id',
                    $student->id
                )
                ->whereIn(
                    'payment_status',
                    [
                        self::STATUS_PENDING,
                        self::STATUS_PAID,
                    ]
                )
                ->latest()
                ->get()
                ->unique('document_id')
                ->mapWithKeys(function ($purchase) {

                    return [
                        $purchase->document_id => [
                            'id' => $purchase->id,
                            'status' => $purchase->payment_status,
                        ],
                    ];
                })
                ->toArray();
        }

        return view(
            'livewire.student.document.document-marketplace',
            [
                'documents' =>
                    Document::latest()
                        ->get(),

                'purchaseStatuses' =>
                    $purchaseStatuses,
            ]
        )->layout(
            auth()->check()
                ? 'layouts.student'
                : 'layouts.public'
        );
    }
}

<?php

namespace App\Livewire\Student\Document;

use App\Models\DocumentPurchase;
use Livewire\Component;

class MyDocuments extends Component
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_PAID = 'PAID';
    const STATUS_CANCELLED = 'CANCELLED';
    
    public $showPaymentModal = false;

    public $purchaseId = null;

    public function cancelPurchase($purchaseId)
    {
        $purchase =
            DocumentPurchase::find(
                $purchaseId
            );

        $purchase->update([

            'payment_status' => 'CANCELLED',
        ]);

        session()->flash(
            'success',
            'Purchase cancelled.'
        );
    }

    public function continuePayment($purchaseId)
    {
        $this->purchaseId = $purchaseId;

        $this->showPaymentModal = true;
    }

    public function closePaymentModal()
    {
        $this->showPaymentModal = false;
    }

    public function confirmPayment()
    {
        $purchase =
            DocumentPurchase::find(
                $this->purchaseId
            );

        $purchase->update([

            'payment_status' => 'PAID',
        ]);

        $this->showPaymentModal = false;

        session()->flash(
            'success',
            'Payment completed successfully.'
        );
    }

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

            ->whereIn('payment_status', [
                'PAID',
                'PENDING',
            ])

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
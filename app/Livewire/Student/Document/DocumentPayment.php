<?php

namespace App\Livewire\Student\Document;

use App\Models\DocumentPurchase;
use Livewire\Component;

class DocumentPayment extends Component
{
    public DocumentPurchase $purchase;

    public $step = 'payment';

    public function mount($purchaseId)
    {
        $student =
            auth()->user()->student;

        $this->purchase =
            DocumentPurchase::with('document')
                ->where(
                    'student_id',
                    $student->id
                )
                ->findOrFail(
                    $purchaseId
                );

        if ($this->purchase->payment_status === 'PAID') {

            $this->step = 'success';
        }
    }

    public function cancelPayment()
    {
        if ($this->purchase->payment_status === 'PENDING') {

            $this->purchase->update([

                'payment_status' => 'CANCELLED',
            ]);
        }

        return redirect('/documents');
    }

    public function confirmPayment()
    {
        $this->purchase->update([

            'payment_status' => 'PAID',
        ]);

        $this->purchase->refresh();

        $this->purchase->load('document');

        $this->step = 'success';
    }

    public function render()
    {
        return view(
            'livewire.student.document.document-payment'
        )->layout('layouts.student');
    }
}

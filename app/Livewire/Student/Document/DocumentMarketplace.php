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

            ->where(
                'payment_status',
                'PAID'
            )

            ->exists();

        if ($alreadyPurchased) {

            return;
        }

        $purchase = DocumentPurchase::create([

            'student_id' =>
                $student->id,

            'document_id' =>
                $documentId,

            'payment_status' =>
                'PENDING',
        ]);

        $this->purchaseId = $purchase->id;

        $this->showPaymentModal = true;

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
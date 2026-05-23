<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Document;
use App\Models\DocumentPurchase;

class Dashboard extends Component
{
    public $totalDocumentRevenue;

    public $totalDocumentSales;

    public $topSellingDocument;

    public $totalStudents;

    public $totalMentors;

    public $totalScholarships;

    public $totalBookings;

    public $recentBookings;

    public function mount()
    {
        $this->totalDocumentSales =

            DocumentPurchase::where(

                'payment_status',

                'PAID'

            )->count();

        $this->totalDocumentRevenue =

            DocumentPurchase::where(

                'payment_status',

                'PAID'

            )

            ->join(

                'documents',

                'document_purchases.document_id',

                '=',

                'documents.id'
            )

            ->sum(
                'documents.price'
            );

        $this->topSellingDocument =

            Document::withCount([

                'purchases' => function ($query) {

                    $query->where(

                        'payment_status',

                        'PAID'
                    );
                }

            ])

            ->orderByDesc(
                'purchases_count'
            )

            ->first();

        $this->totalStudents =
            \App\Models\Student::count();

        $this->totalMentors =
            \App\Models\Mentor::count();

        $this->totalScholarships =
            \App\Models\Scholarship::count();

        $this->totalBookings =
            \App\Models\MentorBooking::where(
                'payment_status',
                'PAID'
            )

            ->count();

        $this->recentBookings =
            \App\Models\MentorBooking::with([
                'student',
                'mentor'
            ])

            ->latest()

            ->take(5)

            ->get();
    }

    public function render()
    {
        return view(
            'livewire.admin.dashboard.dashboard'
        )->layout('layouts.admin');
    }
}
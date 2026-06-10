<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Document;
use App\Models\DocumentPurchase;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\Scholarship;
use App\Models\MentorBooking;
use App\Models\MentorReview;
use Carbon\Carbon;

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

    // New metrics
    public $activeStudents;

    public $activeMentors;

    public $pendingScholarships;

    public $monthlyRevenue;

    public $totalMentorEarnings;

    public $averageRating;

    public $recentActivities;

    public $topMentors;

    public $topDocuments;

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
            ->with('document')
            ->get()
            ->sum(function ($purchase) {
                return $purchase->document->price;
            });

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
            Student::count();

        $this->totalMentors =
            Mentor::count();

        $this->totalScholarships =
            Scholarship::count();

        $this->totalBookings =
            MentorBooking::where(
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

        // Additional metrics
        $this->activeStudents = Student::where(
            'created_at',
            '>=',
            Carbon::now()->subDays(30)
        )->count();

        $this->activeMentors = Mentor::where(
            'created_at',
            '>=',
            Carbon::now()->subDays(30)
        )->count();

        $this->pendingScholarships = Scholarship::where(
            'status',
            '!=',
            'APPROVED'
        )->count();

        $this->monthlyRevenue = DocumentPurchase::where(
            'payment_status',
            'PAID'
        )
            ->where(
                'created_at',
                '>=',
                Carbon::now()->startOfMonth()
            )
            ->with('document')
            ->get()
            ->sum(function ($purchase) {
                return $purchase->document->price;
            });

        $this->totalMentorEarnings = MentorBooking::where(
            'payment_status',
            'PAID'
        )
            ->with('mentor')
            ->get()
            ->sum(function ($booking) {
                return $booking->mentor->session_price;
            });

        $this->averageRating = MentorReview::avg('rating') ?? 0;

        $this->topMentors = Mentor::withCount([
            'bookings' => function ($query) {
                $query->where('payment_status', 'PAID');
            }
        ])
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        $this->topDocuments = Document::withCount([
            'purchases' => function ($query) {
                $query->where('payment_status', 'PAID');
            }
        ])
            ->orderByDesc('purchases_count')
            ->take(5)
            ->get();

        $this->recentActivities = collect([
            [
                'type' => 'New Student',
                'count' => Student::where(
                    'created_at',
                    '>=',
                    Carbon::now()->subDay()
                )->count(),
                'icon' => '👤'
            ],
            [
                'type' => 'New Booking',
                'count' => MentorBooking::where(
                    'created_at',
                    '>=',
                    Carbon::now()->subDay()
                )->count(),
                'icon' => '📅'
            ],
            [
                'type' => 'Document Sales',
                'count' => DocumentPurchase::where(
                    'payment_status',
                    'PAID'
                )
                    ->where(
                        'created_at',
                        '>=',
                        Carbon::now()->subDay()
                    )
                    ->count(),
                'icon' => '📄'
            ],
        ]);
    }

    public function render()
    {
        return view(
            'livewire.admin.dashboard.dashboard'
        )->layout('layouts.admin');
    }
}

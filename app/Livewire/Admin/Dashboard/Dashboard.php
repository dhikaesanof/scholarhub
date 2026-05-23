<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

class Dashboard extends Component
{
    public $totalStudents;

    public $totalMentors;

    public $totalScholarships;

    public $totalBookings;

    public $recentBookings;

    public function mount()
    {
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
<?php

namespace App\Livewire\Mentor\Dashboard;

use Livewire\Component;
use App\Models\MentorBooking;
use App\Models\MentorReview;

class Dashboard extends Component
{
    public function render()
    {
        $mentor =
            auth()->user()->mentor;

        $sessionsThisWeek =

            MentorBooking::where(
                'mentor_id',
                $mentor->id
            )

            ->where(
                'payment_status',
                'PAID'
            )

            ->whereHas(
                'availability',

                function ($query) {

                    $query->whereBetween(

                        'date',

                        [
                            now()->startOfWeek(),

                            now()->endOfWeek()
                        ]
                    );
                }
            )

            ->count();

        $averageRating =

            MentorReview::where(
                'mentor_id',
                $mentor->id
            )

            ->avg('rating');

        $totalEarnings =

            MentorBooking::where(
                'mentor_id',
                $mentor->id
            )

            ->where(
                'payment_status',
                'PAID'
            )

            ->count() * 75000;

        $upcomingSessions =

            MentorBooking::with([

                'student.user',

                'availability'
            ])

            ->where(
                'mentor_id',
                $mentor->id
            )

            ->where(
                'payment_status',
                'PAID'
            )

            ->take(2)

            ->get();

        $recentReviews =

            MentorReview::with(
                'student.user'
            )

            ->where(
                'mentor_id',
                $mentor->id
            )

            ->latest()

            ->take(3)

            ->get();

        return view(

            'livewire.mentor.dashboard.dashboard',

            [

                'sessionsThisWeek' =>
                    $sessionsThisWeek,

                'averageRating' =>
                    $averageRating,

                'totalEarnings' =>
                    $totalEarnings,

                'upcomingSessions' =>
                    $upcomingSessions,

                'recentReviews' =>
                    $recentReviews,
            ]

        )->layout('layouts.mentor');
    }
}
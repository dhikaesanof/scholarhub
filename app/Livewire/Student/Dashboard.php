<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\AssessmentResult;
use App\Models\MentorBooking;

class Dashboard extends Component
{
    public function render()
    {
        $notifications = collect();

        $student = auth()->user()->student;

        $latestAssessment =

            AssessmentResult::where(

                'student_id',

                $student->id
            )

            ->latest()

            ->first();

        $latestRoadmaps = collect();

            if ($latestAssessment) {

                $latestRoadmaps =

                    $latestAssessment

                        ->roadmaps()

                        ->latest()

                        ->take(3)

                        ->get();
            }

        $recommendedScholarships =

            Scholarship::where(

                'education_level',

                $student->education_level
                    ?? 'Bachelor'
            )

            ->latest()

            ->take(3)

            ->get();

        $openingSoon = Scholarship::whereBetween(

            'registration_open_date',

            [

                now(),

                now()->addDays(3)
            ]
        )->get();

        $closingSoon = Scholarship::whereBetween(

            'deadline',

            [

                now(),

                now()->addDays(3)
            ]
        )->get();

        foreach ($openingSoon as $scholarship) {

            $notifications->push([

                'type' => 'opening',

                'title' => $scholarship->title,

                'message' =>

                    'Registration opens in ' .

                    now()->startOfDay()->diffInDays(

                        \Carbon\Carbon::parse(

                            $scholarship->registration_open_date

                        )->startOfDay()
                    ) .

                    ' days.',
            ]);
        }

        foreach ($closingSoon as $scholarship) {

            $notifications->push([

                'type' => 'closing',

                'title' => $scholarship->title,

                'message' =>

                    'Registration closes in ' .

                    now()->startOfDay()->diffInDays(
                        \Carbon\Carbon::parse(
                            $scholarship->deadline
                        )->startOfDay()
                    ) .

                    ' days.',
            ]);
        }

        $upcomingBookings = MentorBooking::where(

                'student_id',

                $student->id
            )

            ->where(

                'session_status',

                'UPCOMING'
            )

            ->where(

                'payment_status',

                'PAID'
            )

            ->latest()

            ->take(3)

            ->get();

        foreach (

            $upcomingBookings
            as $booking
        ) {

            $slot =
                $booking->availability;

            $notifications->push([

                'type' => 'booking',

                'title' =>

                    'Upcoming Mentorship',

                'message' =>

                    'Session with ' .

                    $booking
                        ->mentor
                        ->user
                        ->name .

                    ' on ' .

                    \Carbon\Carbon::parse(

                        $slot->date

                    )->format('d M Y') .

                    ' • ' .

                    $slot->start_time .
                    ' - ' .
                    $slot->end_time,
            ]);
        }

        return view(
            'livewire.student.dashboard',
            [
                'latestAssessment' =>
                    $latestAssessment,

                'latestRoadmaps' =>
                    $latestRoadmaps,

                'recommendedScholarships' =>
                    $recommendedScholarships,

                'notifications' => 
                    $notifications,
            ]
        )->layout('layouts.student');
    }
}
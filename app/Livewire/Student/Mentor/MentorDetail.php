<?php

namespace App\Livewire\Student\Mentor;

use App\Models\Mentor;
use Livewire\Component;
use App\Models\MentorBooking;
use App\Models\MentorAvailability;
use App\Models\MentorReview;

class MentorDetail extends Component
{
    public Mentor $mentor;

    public function book($availabilityId)
    {
        $availability =
            MentorAvailability::findOrFail(
                $availabilityId
            );

        // PREVENT DOUBLE BOOK

        if ($availability->is_booked) {

            session()->flash(
                'error',
                'This slot is already booked.'
            );

            return;
        }

        $student =
            auth()->user()->student;

        MentorBooking::create([

            'student_id' =>
                $student->id,

            'mentor_id' =>
                $this->mentor->id,

            'mentor_availability_id' =>
                $availability->id,

            'status' => 'BOOKED',
        ]);

        // UPDATE SLOT

        $availability->update([

            'is_booked' => true,
        ]);

        session()->flash(
            'success',
            'Session booked successfully.'
        );
    }

    public function mount($mentorId)
    {
        $this->mentor = Mentor::findOrFail(
            $mentorId
        );
    }

    public function render()
    {
        $reviews =
            MentorReview::where(
                'mentor_id',
                $this->mentor->id
            )

            ->latest()

            ->take(3)

            ->get();
            
        $availabilities =
            $this->mentor
            ->availabilities()

            ->where('is_booked', false)

            ->orderBy('date')

            ->orderBy('start_time')

            ->get();

        return view(
            'livewire.student.mentor.mentor-detail',
            [
                'availabilities'
                    => $availabilities,
                'reviews' =>
                    $reviews,
            ]
        )->layout('layouts.student');
    }
}
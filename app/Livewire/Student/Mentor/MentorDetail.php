<?php

namespace App\Livewire\Student\Mentor;

use App\Models\Mentor;
use Livewire\Component;
use App\Models\MentorBooking;
use App\Models\MentorAvailability;
use App\Models\MentorReview;
use Carbon\Carbon;

class MentorDetail extends Component
{
    public Mentor $mentor;

    public $selectedDate = null;

    public $selectedSlot = null;

    public function selectSlot($slotId)
    {
        $this->selectedSlot = $slotId;
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;

        $this->selectedSlot = null;
    }

    public function continueBooking()
    {
        if (!$this->selectedSlot) {

            session()->flash(

                'error',

                'Please select a slot first.'
            );

            return;
        }

        return redirect(

            '/student/bookings/create/' .

            $this->selectedSlot
        );
    }

    public function book()
    {
        $availability =
            MentorAvailability::findOrFail(
                $this->selectedSlot
            );

        // PREVENT DOUBLE BOOK

        if ($availability->is_booked) {

            session()->flash(
                'error',
                'This slot is already booked.'
            );

            return;
        }

        if (

            Carbon::parse(

                $availability->date . ' ' .

                $availability->start_time

            )->isPast()
        ) {

            session()->flash(

                'error',

                'This slot has expired.'
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

        $firstAvailability =

            MentorAvailability::where(

                'mentor_id',

                $this->mentor->id
            )

            ->where(

                'date',

                '<=',

                now()
                    ->addWeek()
                    ->toDateString()
            )

            ->orderBy('date')

            ->first();

        if ($firstAvailability) {

            $this->selectedDate =
                $firstAvailability->date;
        }
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

            MentorAvailability::where(

                'mentor_id',

                $this->mentor->id
            )

            ->where(

                'date',

                '<=',

                now()
                    ->addWeek()
                    ->toDateString()
            )

            ->orderBy('date')

            ->orderBy('start_time')

            ->get()

            ->filter(function ($slot) {

                return Carbon::parse(

                    $slot->date . ' ' . $slot->start_time

                )->isFuture();
            });

        $availableDates =

            $availabilities

                ->pluck('date')

                ->unique()

                ->values();

        $filteredSlots =

            $availabilities

                ->where(
                    'date',
                    $this->selectedDate
                );

        return view(
            'livewire.student.mentor.mentor-detail',
            [
                'availabilities'
                    => $availabilities,

                'reviews' =>
                    $reviews,

                'availableDates' =>
                    $availableDates,

                'filteredSlots' =>
                    $filteredSlots,
            ]
        )->layout('layouts.student');
    }
}
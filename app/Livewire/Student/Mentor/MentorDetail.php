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

    private function firstBookableSlotForDate($date)
    {
        if (!$date) {

            return null;
        }

        return MentorAvailability::where(
                'mentor_id',
                $this->mentor->id
            )
            ->where(
                'date',
                $date
            )
            ->where(
                'is_booked',
                false
            )
            ->orderBy('start_time')
            ->get()
            ->first(function ($slot) {

                return Carbon::parse(

                    $slot->date . ' ' . $slot->start_time

                )->isFuture();
            });
    }

    public function selectSlot($slotId)
    {
        $slot =
            MentorAvailability::find(
                $slotId
            );

        if (
            !$slot
            || (int) $slot->mentor_id !== (int) $this->mentor->id
            || $slot->is_booked
            || Carbon::parse(
                $slot->date . ' ' . $slot->start_time
            )->isPast()
        ) {

            $this->selectedSlot = null;

            return;
        }

        $this->selectedSlot = $slotId;
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;

        $firstSlot =
            $this->firstBookableSlotForDate(
                $date
            );

        $this->selectedSlot =
            $firstSlot
                ? $firstSlot->id
                : null;
    }

    public function continueBooking()
    {
        if (!auth()->check()) {

            return redirect('/login');
        }

        if (!$this->selectedSlot) {

            $firstSlot =
                $this->firstBookableSlotForDate(
                    $this->selectedDate
                );

            $this->selectedSlot =
                $firstSlot
                    ? $firstSlot->id
                    : null;
        }

        $slot =
            $this->selectedSlot
                ? MentorAvailability::find(
                    $this->selectedSlot
                )
                : null;

        if (
            !$slot
            || (int) $slot->mentor_id !== (int) $this->mentor->id
            || $slot->is_booked
            || Carbon::parse(
                $slot->date . ' ' . $slot->start_time
            )->isPast()
        ) {

            $this->selectedSlot = null;

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

        $this->selectedDate = null;
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

                '>=',

                now()
                    ->toDateString()
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
            })

            ->values();

        $availableDates =

            $availabilities

                ->pluck('date')

                ->unique()

                ->values();

        if (
            $availableDates->isNotEmpty()
            && !$availableDates->contains($this->selectedDate)
        ) {

            $firstBookableSlot =
            $availabilities
                    ->where(
                        'is_booked',
                        false
                    )
                    ->first();

            $this->selectedDate =
                $firstBookableSlot
                    ? $firstBookableSlot->date
                    : $availableDates->first();

            $this->selectedSlot =
                $firstBookableSlot
                    ? $firstBookableSlot->id
                    : null;
        }

        if ($availableDates->isEmpty()) {

            $this->selectedDate = null;

            $this->selectedSlot = null;
        }

        $filteredSlots =

            $availabilities

                ->where(
                    'date',
                    $this->selectedDate
                );

        if (
            $filteredSlots->isNotEmpty()
            && !$filteredSlots->contains(
                'id',
                $this->selectedSlot
            )
        ) {

            $firstBookableSlot =
                $filteredSlots
                    ->where(
                        'is_booked',
                        false
                    )
                    ->first();

            $this->selectedSlot =
                $firstBookableSlot
                    ? $firstBookableSlot->id
                    : null;
        }

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
        )->layout(auth()->check()

            ? 'layouts.student'

            : 'layouts.public');
    }
}

<?php

namespace App\Livewire\Student\Booking;

use Livewire\Component;
use App\Models\MentorBooking;
use App\Models\MentorAvailability;
use Illuminate\Support\Facades\DB;

class BookingCreate extends Component
{
    public MentorAvailability $availability;

    public $topic;

    public $showPaymentModal = false;

    public $bookingId = null;

    public function cleanupExpiredBookings()
    {
        $expiredBookings =

            MentorBooking::where(
                'payment_status',
                'PENDING'
            )

            ->where(
                'created_at',
                '<',
                now()->subMinutes(5)
            )

            ->get();

        foreach (
            $expiredBookings
            as $booking
        ) {

            $booking
                ->availability
                ->update([

                    'is_booked' => false,
                ]);

            $booking->delete();
        }
    }

    public function closePaymentModal()
    {
        $this->showPaymentModal = false;

        session()->flash(
            'success',
            'Booking saved as pending payment.'
        );
    }

    public function confirmPayment()
    {
        $booking =
            MentorBooking::findOrFail(
                $this->bookingId
            );

        $booking->update([

            'payment_status' => 'PAID',
        ]);

        session()->flash(
            'success',
            'Payment confirmed successfully.'
        );

        $this->showPaymentModal = false;
    }

    public function createBooking()
    {
        $this->validate([

            'topic' => 'required',
        ]);

        // RECHECK SLOT

        if ($this->availability->is_booked) {

            session()->flash(
                'error',
                'Slot already booked.'
            );

            return;
        }

        $student =
            auth()->user()->student;

        $hasPendingBooking =
            MentorBooking::where(
                'student_id',
                $student->id
            )

            ->where(
                'payment_status',
                'PENDING'
            )

            ->exists();

        if ($hasPendingBooking) {

            session()->flash(
                'error',
                'You still have a pending booking payment.'
            );

            return;
        }

        DB::transaction(function () use ($student) {

            $availability =

                MentorAvailability::lockForUpdate()
                    ->find(
                        $this->availability->id
                    );

            if ($availability->is_booked) {

                session()->flash(
                    'error',
                    'Slot already booked.'
                );

                return;
            }

            $availability->update([

                'is_booked' => true,
            ]);

            $booking =
                MentorBooking::create([

                    'student_id' =>
                        $student->id,

                    'mentor_id' =>
                        $availability->mentor_id,

                    'mentor_availability_id' =>
                        $availability->id,

                    'topic' =>
                        $this->topic,

                    'payment_status' =>
                        'PENDING',

                    'session_status' =>
                        'UPCOMING',
                ]);

            $this->bookingId =
                $booking->id;
        });

        $this->showPaymentModal = true;
    }

    public function mount($slotId)
    {
        $this->cleanupExpiredBookings();

        $this->availability =
            MentorAvailability::findOrFail(
                $slotId
            );
    }

    public function render()
    {
        return view(
            'livewire.student.booking.booking-create'
        )->layout('layouts.student');
    }
}
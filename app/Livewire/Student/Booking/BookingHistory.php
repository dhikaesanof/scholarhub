<?php

namespace App\Livewire\Student\Booking;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Mentor;
use App\Models\MentorBooking;
use App\Models\MentorReview;

class BookingHistory extends Component
{
    public $showPaymentModal = false;

    public $selectedBookingId = null;

    public $showSessionModal = false;

    public $selectedBooking;

    public $showReviewModal = false;

    public $reviewBookingId = null;

    public $rating = 5;

    public $review = '';

    public $strengths = [];

    public function closePaymentModal()
    {
        $this->showPaymentModal = false;
    }

    public function submitReview()
    {
        $booking =
            MentorBooking::findOrFail(
                $this->reviewBookingId
            );

        $student =
            auth()->user()->student;

        $alreadyReviewed =
            MentorReview::where(
                'mentor_booking_id',
                $booking->id
            )->exists();

        if ($alreadyReviewed) {

            session()->flash(
                'error',
                'You already reviewed this session.'
            );

            return;
        }

        MentorReview::create([

            'mentor_booking_id' =>
                $booking->id,

            'student_id' =>
                $student->id,

            'mentor_id' =>
                $booking->mentor_id,

            'rating' =>
                $this->rating,

            'review' =>
                $this->review,

            'strengths' =>
                $this->strengths,
        ]);

        // UPDATE AVERAGE RATING

        $averageRating =
            MentorReview::where(
                'mentor_id',
                $booking->mentor_id
            )

            ->avg('rating');

        Mentor::where(
            'id',
            $booking->mentor_id
        )
        ->update([

            'average_rating' =>
                round(
                    $averageRating,
                    1
                ),
        ]);

        $this->showReviewModal = false;

        session()->flash(
            'success',
            'Review submitted successfully.'
        );
    }

    public function leaveReview($bookingId)
    {
        $this->reviewBookingId =
            $bookingId;

        $this->showReviewModal = true;
    }

    public function viewSession($bookingId)
    {
        $this->selectedBooking =
            MentorBooking::findOrFail(
                $bookingId
            );

        $this->showSessionModal = true;
    }

    public function mount()
    {
        $this->cleanupExpiredBookings();
    }

    // AUTO DELETE PENDING > 5 MINUTES

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
                Carbon::now()->subMinutes(5)
            )

            ->get();

        foreach ($expiredBookings as $booking) {

            $booking
                ->availability
                ->update([

                    'is_booked' => false,
                ]);

            $booking->delete();
        }
    }

    public function continuePayment($bookingId)
    {
        $this->selectedBookingId =
            $bookingId;

        $this->showPaymentModal = true;
    }

    public function confirmPayment()
    {
        $booking =
            MentorBooking::findOrFail(
                $this->selectedBookingId
            );

        // RECHECK SLOT

        if (
            !$booking->availability
            ||
            !$booking->availability->is_booked
        ) {

            session()->flash(
                'error',
                'This slot is no longer available.'
            );

            return;
        }

        $booking->update([

            'payment_status' => 'PAID',
        ]);

        $this->showPaymentModal = false;

        session()->flash(
            'success',
            'Payment confirmed successfully.'
        );
    }

    public function cancelBooking($bookingId)
    {
        $booking =
            MentorBooking::findOrFail(
                $bookingId
            );

        // RELEASE SLOT

        $booking
            ->availability
            ->update([

                'is_booked' => false,
            ]);

        $booking->delete();

        session()->flash(
            'success',
            'Booking cancelled successfully.'
        );
    }

    public function render()
    {
        $student =
            auth()->user()->student;

        $bookings =
            MentorBooking::where(
                'student_id',
                $student->id
            )

            ->latest()

            ->get();

        return view(
            'livewire.student.booking.booking-history',
            [
                'bookings' => $bookings,
            ]
        )->layout('layouts.student');
    }
}
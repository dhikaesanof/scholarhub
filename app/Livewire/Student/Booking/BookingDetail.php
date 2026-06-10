<?php

namespace App\Livewire\Student\Booking;

use App\Models\Mentor;
use App\Models\MentorBooking;
use App\Models\MentorReview;
use Livewire\Component;

class BookingDetail extends Component
{
    public MentorBooking $booking;

    public $showReviewModal = false;

    public $reviewBookingId = null;

    public $rating = 0;

    public $review = '';

    public $strengths = [];

    public function mount($bookingId)
    {
        $student =
            auth()->user()->student;

        $this->booking =
            MentorBooking::with([
                'mentor.user',
                'availability',
            ])
            ->where(
                'student_id',
                $student->id
            )
            ->findOrFail(
                $bookingId
            );
    }

    public function getExistingReviewProperty()
    {
        return MentorReview::where(
            'mentor_booking_id',
            $this->booking->id
        )->first();
    }

    public function getSessionEndedProperty()
    {
        if (!$this->booking->availability) {

            return false;
        }

        $sessionEnd =
            \Carbon\Carbon::parse(
                $this->booking->availability->date .
                ' ' .
                $this->booking->availability->end_time
            );

        return now()->greaterThan(
            $sessionEnd
        );
    }

    public function getCanReviewProperty()
    {
        return $this->booking->payment_status === 'PAID'
            && $this->sessionEnded
            && !$this->existingReview;
    }

    public function leaveReview($bookingId = null)
    {
        if (!$this->canReview) {

            return;
        }

        $this->reviewBookingId =
            $this->booking->id;

        $this->rating = 0;

        $this->review = '';

        $this->strengths = [];

        $this->showReviewModal = true;
    }

    public function submitReview()
    {
        if (!$this->canReview) {

            session()->flash(
                'error',
                'This session cannot be reviewed.'
            );

            return;
        }

        $this->validate([

            'rating' => 'required|integer|min:1|max:5',

            'review' => 'required|string|min:3',

            'strengths' => 'array',
        ]);

        $student =
            auth()->user()->student;

        MentorReview::create([

            'mentor_booking_id' =>
                $this->booking->id,

            'student_id' =>
                $student->id,

            'mentor_id' =>
                $this->booking->mentor_id,

            'rating' =>
                $this->rating,

            'review' =>
                $this->review,

            'strengths' =>
                $this->strengths,
        ]);

        $averageRating =
            MentorReview::where(
                'mentor_id',
                $this->booking->mentor_id
            )->avg('rating');

        Mentor::where(
            'id',
            $this->booking->mentor_id
        )->update([

            'average_rating' =>
                round(
                    $averageRating,
                    1
                ),
        ]);

        $this->booking->load([
            'mentor.user',
            'availability',
        ]);

        $this->showReviewModal = false;

        session()->flash(
            'success',
            'Review submitted successfully.'
        );
    }

    public function render()
    {
        return view(
            'livewire.student.booking.booking-detail'
        )->layout('layouts.student');
    }
}

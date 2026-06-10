<?php

namespace App\Livewire\Student\Mentor;

use App\Models\Mentor;
use App\Models\MentorReview;
use Livewire\Component;

class MentorReviews extends Component
{
    public Mentor $mentor;

    public $search = '';

    public $ratingFilter = '';

    public function mount($mentorId)
    {
        $this->mentor = Mentor::findOrFail(
            $mentorId
        );
    }

    public function render()
    {
        $reviews =
            MentorReview::with('student.user')
                ->where(
                    'mentor_id',
                    $this->mentor->id
                )
                ->when(
                    $this->search,
                    function ($query) {

                        $query->where(function ($query) {

                            $query
                                ->where(
                                    'review',
                                    'like',
                                    '%' . $this->search . '%'
                                )
                                ->orWhereJsonContains(
                                    'strengths',
                                    $this->search
                                );
                        });
                    }
                )
                ->when(
                    $this->ratingFilter,
                    fn ($query) =>
                        $query->where(
                            'rating',
                            $this->ratingFilter
                        )
                )
                ->latest()
                ->get();

        $averageRating =
            $this->mentor->average_rating
                ?? MentorReview::where(
                    'mentor_id',
                    $this->mentor->id
                )->avg('rating');

        return view(
            'livewire.student.mentor.mentor-reviews',
            [
                'reviews' =>
                    $reviews,

                'averageRating' =>
                    $averageRating,
            ]
        )->layout(auth()->check()

            ? 'layouts.student'

            : 'layouts.public');
    }
}

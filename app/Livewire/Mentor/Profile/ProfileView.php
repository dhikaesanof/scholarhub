<?php

namespace App\Livewire\Mentor\Profile;

use Livewire\Component;

use App\Models\MentorReview;

class ProfileView extends Component
{
    public function render()
    {
        $mentor =
            auth()->user()->mentor;

        $averageRating =

            MentorReview::where(
                'mentor_id',
                $mentor->id
            )

            ->avg('rating');

        return view(

            'livewire.mentor.profile.profile-view',

            [

                'mentor' =>
                    $mentor,

                'averageRating' =>
                    $averageRating,
            ]

        )->layout('layouts.mentor');
    }
}
<?php

namespace App\Livewire\Student\Mentor;

use App\Models\Mentor;

use Livewire\Component;

class MentorDetail extends Component
{
    public Mentor $mentor;

    public function mount($mentorId)
    {
        $this->mentor = Mentor::findOrFail(
            $mentorId
        );
    }

    public function render()
    {
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
            ]
        )->layout('layouts.student');
    }
}
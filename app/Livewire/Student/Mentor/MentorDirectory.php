<?php

namespace App\Livewire\Student\Mentor;

use App\Models\Mentor;

use Livewire\Component;

class MentorDirectory extends Component
{
    public function render()
    {
        $mentors = Mentor::latest()
            ->get();

        return view(
            'livewire.student.mentor.mentor-directory',
            [
                'mentors' => $mentors,
            ]
        )->layout('layouts.student');
    }
}
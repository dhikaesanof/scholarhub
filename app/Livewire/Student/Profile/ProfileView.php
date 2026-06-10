<?php

namespace App\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;

class ProfileView extends Component
{
    public function mount()
    {
        $user =
            auth()->user();

        if (!$user->student) {

            Student::create([

                'user_id' =>
                    $user->id,

                'university' =>
                    '',

                'major' =>
                    '',

                'semester' =>
                    1,
            ]);
        }
    }

    public function render()
    {
        return view(
            'livewire.student.profile.profile-view'
        )->layout(
            'layouts.student'
        );
    }
}

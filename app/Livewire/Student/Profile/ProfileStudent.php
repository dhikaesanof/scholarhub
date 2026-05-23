<?php

namespace App\Livewire\Student\Profile;

use Livewire\Component;

use Livewire\WithFileUploads;

class ProfileStudent extends Component
{
    use WithFileUploads;

    public $full_name;

    public $email;

    public $university;

    public $major;

    public $semester;

    public $profile_photo;

    public function mount()
    {
        $student =
            auth()->user()->student;

        $this->full_name =
            $student->full_name;

        $this->email =
            auth()->user()->email;

        $this->university =
            $student->university;

        $this->major =
            $student->major;

        $this->semester =
            $student->semester;
    }

    public function updateProfile()
    {
        $this->validate([

            'full_name' =>
                'required',

            'email' =>
                'required|email',

            'university' =>
                'required',

            'major' =>
                'required',

            'semester' =>
                'required',

            'profile_photo' =>
                'nullable|image|max:2048',
        ]);

        $user =
            auth()->user();

        $student =
            $user->student;

        $photoPath =
            $user->profile_photo;

        if ($this->profile_photo) {

            $photoPath =

                $this->profile_photo
                    ->store(

                        'profile-photos',

                        'public'
                    );
        }

        $user->update([

            'email' =>
                $this->email,

            'profile_photo' =>
                $photoPath,
        ]);

        $student->update([

            'full_name' =>
                $this->full_name,

            'university' =>
                $this->university,

            'major' =>
                $this->major,

            'semester' =>
                $this->semester,
        ]);

        session()->flash(

            'success',

            'Profile updated successfully.'
        );
    }

    public function render()
    {
        return view(
            'livewire.student.profile.profile'
        )

        ->layout(
            'layouts.student'
        );
    }
}
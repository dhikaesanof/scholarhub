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
        $user =
            auth()->user();

        $student =
            $user->student;

        if (!$student) {

            $student =

                \App\Models\Student::create([

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

        $this->full_name =
            $user->name;

        $this->email =
            $user->email;

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

            'name' =>
                $this->full_name,

            'email' =>
                $this->email,

            'profile_photo' =>
                $photoPath,
        ]);

        $student->update([

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
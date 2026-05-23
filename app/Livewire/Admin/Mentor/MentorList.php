<?php

namespace App\Livewire\Admin\Mentor;

use Livewire\Component;
use App\Models\User;
use App\Models\Mentor;

class MentorList extends Component
{
    public $showForm = false;

    public $full_name;

    public $email;

    public $password;

    public $university;

    public $major;

    public $bio;

    public $achievements;

    public $specialization;

    public function toggleBlock($id)
    {
        $user =
            User::findOrFail($id);

        $user->update([

            'is_blocked' =>
                !$user->is_blocked,
        ]);
    }

    public function toggleForm()
    {
        $this->showForm =
            !$this->showForm;
    }

    public function render()
    {
        $mentors = User::where(
            'role',
            'MENTOR'
        )
        ->with('mentor')
        ->latest()
        ->get();

        return view(
            'livewire.admin.mentor.mentor-list',
            [
                'mentors' => $mentors,
            ]
        )->layout('layouts.admin');
    }
    
    public function save()
    {
        $this->validate([

            'full_name' =>
                'required',

            'email' =>

                'required|email|unique:users,email',

            'password' =>

                'required|min:6',

            'specialization' =>
                'required',
        ]);

        $user = User::create([

            'name' =>
                $this->full_name,

            'email' =>
                $this->email,

            'password' =>
                bcrypt(
                    $this->password
                ),

            'role' =>
                'MENTOR',
        ]);

        Mentor::create([

            'user_id' =>
                $user->id,

            'full_name' =>
                $this->full_name,

            'university' =>
                $this->university,

            'major' =>
                $this->major,

            'bio' =>
                $this->bio,

            'achievements' =>
                $this->achievements,

            'specialization' =>
                $this->specialization,
        ]);

        session()->flash(

            'success',

            'Mentor created successfully.'
        );

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([

            'full_name',

            'email',

            'password',

            'university',

            'major',

            'bio',

            'achievements',

            'specialization',
        ]);

        $this->showForm = false;
    }
}
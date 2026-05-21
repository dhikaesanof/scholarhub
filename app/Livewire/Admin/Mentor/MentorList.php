<?php

namespace App\Livewire\Admin\Mentor;

use Livewire\Component;
use App\Models\User;
use App\Models\Mentor;

class MentorList extends Component
{
    public $showForm = false;

    public $editingMentorId = null;

    public $full_name;

    public $email;

    public $password;

    public $university;

    public $major;

    public $bio;

    public $achievements;

    public $specialization;

    public function edit($id)
    {
        $mentor = Mentor::findOrFail($id);

        $this->editingMentorId =
            $mentor->id;

        $this->full_name =
            $mentor->full_name;

        $this->email =
            $mentor->user->email;

        $this->university =
            $mentor->university;

        $this->major =
            $mentor->major;

        $this->bio =
            $mentor->bio;

        $this->achievements =
            $mentor->achievements;

        $this->specialization =
            $mentor->specialization;

        $this->showForm = true;
    }

    public function delete($mentorId)
    {
        $mentor = Mentor::findOrFail(
            $mentorId
        );

        $user = $mentor->user;

        $mentor->delete();

        $user->delete();
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

        if ($this->editingMentorId) {

            $mentor = Mentor::findOrFail(
                $this->editingMentorId
            );

            // UPDATE USER

            $mentor->user->update([

                'name' => $this->full_name,

                'email' => $this->email,
            ]);

            // UPDATE MENTOR

            $mentor->update([

                'full_name' => $this->full_name,

                'university' => $this->university,

                'major' => $this->major,

                'bio' => $this->bio,

                'achievements' => $this->achievements,

                'specialization'
                    => $this->specialization,
            ]);

            $this->resetForm();

            return;
        }

        // CREATE MODE

        $this->validate([

            'full_name' => 'required',

            'email' =>
                'required|email|unique:users,email',

            'password' => 'required|min:6',

            'specialization' => 'required',
        ]);

        $user = User::create([

            'name' => $this->full_name,

            'email' => $this->email,

            'password' => bcrypt($this->password),

            'role' => 'MENTOR',
        ]);

        Mentor::create([

            'user_id' => $user->id,

            'full_name' => $this->full_name,

            'university' => $this->university,

            'major' => $this->major,

            'bio' => $this->bio,

            'achievements' => $this->achievements,

            'specialization'
                => $this->specialization,
        ]);

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

        $this->editingMentorId = null;

        $this->showForm = false;
    }
}
<?php

namespace App\Livewire\Mentor\Profile;

use App\Models\Mentor;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $profile_photo;

    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    public $name;

    public $email;

    public $specialization;

    public $bio;

    public $telegram_link;

    public $gmeet_link;

    public $instagram_username;

    public function mount()
    {
        $user = auth()->user();

        // AUTO CREATE PROFILE
        if (!$user->mentor) {

            Mentor::create([

                'user_id' => $user->id,

                'full_name' => $user->name,
            ]);

            $user->refresh();
        }

        $mentor = $user->mentor;

        $this->name =
            $user->name;

        $this->email =
            $user->email;

        $this->specialization =
            $mentor->specialization;

        $this->bio =
            $mentor->bio;

        $this->telegram_link =
            $mentor->telegram_link;

        $this->gmeet_link =
            $mentor->gmeet_link;

        $this->instagram_username =
            $mentor->instagram_username;
    }

    public function save()
    {
        $mentor = auth()->user()->mentor;

        $user = auth()->user();

        $photoPath = $user->profile_photo;

        if ($this->profile_photo) {

            $photoPath =

                $this->profile_photo
                    ->store(

                        'profile-photos',

                        'public'
                    );
        }

        $user->update([

            'name' => $this->name,

            'email' => $this->email,
            
            'profile_photo' => $photoPath,
        ]);

        $mentor->update([

            'specialization' =>
                $this->specialization,

            'bio' =>
                $this->bio,

            'telegram_link' =>
                $this->telegram_link,

            'gmeet_link' =>
                $this->gmeet_link,

            'instagram_username' =>
                $this->instagram_username,
        ]);

        $this->validate([

            'name' => 'required',

            'email' => 'required|email',

            'profile_photo' =>'nullable|image|max:2048',

        ]);

        session()->flash(
            'success',
            'Profile updated successfully.'
        );
    }

    public function updatePassword()
    {
        $this->validate([

            'current_password' =>
                'required',

            'new_password' =>
                'required|min:6|same:new_password_confirmation',

            'new_password_confirmation' =>
                'required',
        ]);

        $user = auth()->user();

        // CHECK CURRENT PASSWORD

        if (
            !Hash::check(
                $this->current_password,
                $user->password
            )
        ) {

            session()->flash(
                'password_error',
                'Current password is incorrect.'
            );

            return;
        }

        // UPDATE PASSWORD

        $user->update([

            'password' =>
                bcrypt($this->new_password),
        ]);

        // RESET INPUT

        $this->reset([

            'current_password',

            'new_password',

            'new_password_confirmation',
        ]);

        session()->flash(
            'password_success',
            'Password updated successfully.'
        );
    }

    public function render()
    {
        return view(
            'livewire.mentor.profile.profile'
        )->layout('layouts.mentor');
    }
}
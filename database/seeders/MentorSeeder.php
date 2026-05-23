<?php

namespace Database\Seeders;

use App\Models\Mentor;

use App\Models\User;

use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    public function run(): void
    {
        $mentorUser =

            User::where(
                'role',
                'MENTOR'
            )->first();

        Mentor::create([

            'user_id' =>
                $mentorUser->id,

            'full_name' =>
                'Mentor One',

            'university' =>
                'University of Oxford',

            'major' =>
                'Computer Science',

            'bio' =>
                'Experienced scholarship mentor.',

            'achievements' =>
                'LPDP Awardee',

            'specialization' =>
                'Scholarship Essay',

            'telegram_link' =>
                'https://t.me/mentorone',

            'gmeet_link' =>
                'https://meet.google.com/demo',

            'instagram_username' =>
                'mentorone',
        ]);
    }
}
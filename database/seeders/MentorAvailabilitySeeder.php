<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Mentor;

use App\Models\MentorAvailability;

class MentorAvailabilitySeeder extends Seeder
{
    public function run(): void
    {
        $mentors =
            Mentor::all();

        foreach ($mentors as $mentor) {

            for ($i = 1; $i <= 3; $i++) {

                MentorAvailability::create([

                    'mentor_id' =>
                        $mentor->id,

                    'date' =>
                        now()->addDays($i),

                    'start_time' =>
                        '19:00',

                    'end_time' =>
                        '20:00',

                    'is_booked' =>
                        false,
                ]);
            }
        }
    }
}
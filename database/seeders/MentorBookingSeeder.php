<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MentorBooking;

use App\Models\Student;

use App\Models\Mentor;

use App\Models\MentorAvailability;

class MentorBookingSeeder extends Seeder
{
    public function run(): void
    {
        $students =
            Student::all();

        $mentors =
            Mentor::all();

        for ($i = 0; $i < 5; $i++) {

            MentorBooking::create([

                'student_id' =>

                    $students->random()->id,

                'mentor_id' =>

                    $mentors->random()->id,

                'mentor_availability_id' =>
                    MentorAvailability::inRandomOrder()
                        ->first()
                        ->id,

                'status' =>

                    collect([
                        'PENDING',
                        'BOOKED'
                    ])->random(),

                'topic' =>

                    collect([

                        'Essay Review',

                        'Scholarship Interview',

                        'CV Improvement',

                        'Scholarship Preparation',

                        'Leadership Experience'
                    ])->random(),

                'payment_status' =>

                    collect([
                        'PENDING',
                        'PAID'
                    ])->random(),

                'session_status' =>

                    collect([

                        'NOT_STARTED',

                        'FINISHED'
                    ])->random(),
            ]);
        }
    }
}
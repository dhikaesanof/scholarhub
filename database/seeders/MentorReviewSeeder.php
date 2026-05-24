<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MentorReview;

use App\Models\MentorBooking;

class MentorReviewSeeder extends Seeder
{
    public function run(): void
    {
        $bookings =
            MentorBooking::where(

                'status',

                'BOOKED'
            )->get();

        foreach ($bookings as $booking) {

            MentorReview::create([

                'mentor_booking_id' =>
                    $booking->id,

                'student_id' =>
                    $booking->student_id,

                'mentor_id' =>
                    $booking->mentor_id,

                'rating' =>
                    rand(4, 5),

                'review' =>

                    collect([

                        'Very helpful mentor and insightful session.',

                        'Great mentoring experience for scholarship preparation.',

                        'The mentor explained everything clearly.',

                        'Excellent mentor for interview preparation.',

                        'Very supportive and motivating mentor.'
                    ])->random(),

                'strengths' =>

                    collect([

                        'Communication',

                        'Essay Review',

                        'Interview Guidance',

                        'Leadership Coaching',

                        'Scholarship Strategy'
                    ])->random(),
            ]);
        }
    }
}
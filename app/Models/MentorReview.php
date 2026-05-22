<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorReview extends Model
{
    protected $fillable = [

        'mentor_booking_id',

        'student_id',

        'mentor_id',

        'rating',

        'review',

        'strengths',
    ];

    protected $casts = [

        'strengths' => 'array',
    ];

    public function mentor()
    {
        return $this->belongsTo(
            Mentor::class
        );
    }

    public function student()
    {
        return $this->belongsTo(
            Student::class
        );
    }

    public function booking()
    {
        return $this->belongsTo(
            MentorBooking::class,
            'mentor_booking_id'
        );
    }
}
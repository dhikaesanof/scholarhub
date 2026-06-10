<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorBooking extends Model
{
    protected $fillable = [

        'student_id',

        'mentor_id',

        'mentor_availability_id',

        'status',

        'topic',

        'payment_status',

        'session_status',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class
        );
    }

    public function mentor()
    {
        return $this->belongsTo(
            Mentor::class
        );
    }

    public function availability()
    {
        return $this->belongsTo(
            MentorAvailability::class,
            'mentor_availability_id'
        );
    }
}

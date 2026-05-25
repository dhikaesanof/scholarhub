<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MentorBooking;

class MentorAvailability extends Model
{
    protected $fillable = [

        'mentor_id',

        'date',

        'start_time',

        'end_time',

        'is_booked',
    ];

    public function bookings()
    {
        return $this->hasMany(

            \App\Models\MentorBooking::class,

            'mentor_availability_id'
        );
    }

    public function booking()
    {
        return $this->hasOne(
            MentorBooking::class,
            'mentor_availability_id'
        )
        ->latestOfMany();
    }

    public function mentor()
    {
        return $this->belongsTo(
            Mentor::class
        );
    }
}
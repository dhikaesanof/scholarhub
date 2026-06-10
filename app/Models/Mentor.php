<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\MentorAvailability;

class Mentor extends Model
{
    protected $fillable = [

        'user_id',

        'university',

        'major',

        'bio',

        'achievements',

        'specialization',

        'telegram_link',

        'gmeet_link',

        'instagram_username',

        'session_price',
    ];

    public function bookings()
    {
        return $this->hasMany(
            \App\Models\MentorBooking::class
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function availabilities()
    {
        return $this->hasMany(
            MentorAvailability::class
        );
    }
}

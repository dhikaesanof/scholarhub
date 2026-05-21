<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Mentor extends Model
{
    protected $fillable = [

        'user_id',

        'full_name',

        'university',

        'major',

        'bio',

        'achievements',

        'specialization',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

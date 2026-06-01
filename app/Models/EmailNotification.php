<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
    protected $fillable = [

        'user_id',

        'scholarship_id',

        'type',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    protected $fillable = [
        'student_id',
        'scholarship_id',
        'readiness_percentage',
    ];
}
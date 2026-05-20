<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AssessmentAnswer;
use App\Models\Scholarship;

class AssessmentResult extends Model
{
    protected $fillable = [
        'student_id',
        'scholarship_id',
        'readiness_percentage',
    ];

    public function answers()
    {
        return $this->hasMany(AssessmentAnswer::class);
    }

    public function scholarship()
    {
        return $this->belongsTo(
            Scholarship::class
        );
    }
}
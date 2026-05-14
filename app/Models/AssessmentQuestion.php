<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    protected $fillable = [
        'scholarship_id',
        'question',
        'weight',
    ];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
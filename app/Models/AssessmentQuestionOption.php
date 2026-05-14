<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentQuestionOption extends Model
{
    protected $fillable = [
        'assessment_question_id',
        'option_text',
        'option_score',
    ];

    public function question()
    {
        return $this->belongsTo(
            AssessmentQuestion::class,
            'assessment_question_id'
        );
    }
}
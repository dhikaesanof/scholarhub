<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentAnswer extends Model
{
    protected $fillable = [
        'assessment_result_id',
        'assessment_question_id',
        'assessment_question_option_id',
        'answer',
        'score',
    ];

    public function question()
    {
        return $this->belongsTo(
            AssessmentQuestion::class,
            'assessment_question_id'
        );
    }

    public function option()
    {
        return $this->belongsTo(
            AssessmentQuestionOption::class,
            'assessment_question_option_id'
        );
    }
}
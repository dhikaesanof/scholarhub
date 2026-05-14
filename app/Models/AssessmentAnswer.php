<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentAnswer extends Model
{
    protected $fillable = [
        'assessment_result_id',
        'assessment_question_id',
        'answer',
        'score',
    ];
}
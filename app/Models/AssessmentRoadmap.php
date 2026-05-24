<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentRoadmap extends Model
{
    protected $fillable = [

        'assessment_result_id',

        'task',

        'is_completed',
    ];

    public function roadmaps()
    {
        return $this->hasMany(
            AssessmentRoadmap::class
        );
    }
}

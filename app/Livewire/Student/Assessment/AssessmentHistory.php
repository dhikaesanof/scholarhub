<?php

namespace App\Livewire\Student\Assessment;

use Livewire\Component;
use App\Models\AssessmentResult;

class AssessmentHistory extends Component
{
    public function render()
    {
        $results = AssessmentResult::where(
            'student_id',
            auth()->user()->student->id
        )
        ->with('scholarship')
        ->latest()
        ->get();

        return view(
            'livewire.student.assessment.assessment-history',
            [
                'results' => $results,
            ]
        )->layout('layouts.student');
    }
}
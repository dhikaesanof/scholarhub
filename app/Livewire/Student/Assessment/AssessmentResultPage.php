<?php

namespace App\Livewire\Student\Assessment;

use Livewire\Component;
use App\Models\AssessmentResult;

class AssessmentResultPage extends Component
{
    public AssessmentResult $result;

    public function mount(AssessmentResult $result)
    {
        $this->result = $result->load(
            'answers.option',
            'scholarship'
        );
    }

    public function render()
    {
        return view(
            'livewire.student.assessment.assessment-result-page'
        )->layout('layouts.student');
    }

    public function getReadinessLabel()
    {
        $score =
            $this->result->readiness_percentage;

        if ($score <= 40) {
            return 'Low Readiness';
        }

        if ($score <= 70) {
            return 'Moderate Readiness';
        }

        return 'High Readiness';
    }
}
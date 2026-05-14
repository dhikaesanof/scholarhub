<?php

namespace App\Livewire\Admin\Assessment;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\AssessmentQuestion;

class QuestionList extends Component
{
    public $scholarship_id;

    public $question;

    public $weight = 10;

    public function save()
    {
        $this->validate([
            'scholarship_id' => 'required',
            'question' => 'required',
            'weight' => 'required|integer|min:1',
        ]);

        AssessmentQuestion::create([
            'scholarship_id' => $this->scholarship_id,
            'question' => $this->question,
            'weight' => $this->weight,
        ]);

        $this->reset([
            'question',
            'weight',
        ]);

        $this->weight = 10;
    }

    public function delete($id)
    {
        AssessmentQuestion::findOrFail($id)->delete();
    }

    public function render()
    {
        return view(
            'livewire.admin.assessment.question-list',
            [
                'scholarships' => Scholarship::all(),

                'questions' => AssessmentQuestion::latest()->get(),
            ]
        )->layout('layouts.admin');
    }
}
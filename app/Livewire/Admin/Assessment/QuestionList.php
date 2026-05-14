<?php

namespace App\Livewire\Admin\Assessment;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentQuestionOption;

class QuestionList extends Component
{
    public $scholarship_id;

    public $question;

    public $weight = 10;

    public $options = [
        [
            'text' => '',
            'score' => 1,
        ],

        [
            'text' => '',
            'score' => 3,
        ],
    ];

    public function addOption()
    {
        $this->options[] = [
            'text' => '',
            'score' => 1,
        ];
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);

        $this->options =
            array_values($this->options);
    }

    public function save()
    {

        $this->validate([
            'scholarship_id' => 'required',
            'question' => 'required',
            'weight' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'options.*.text' => 'required',
            'options.*.score' => 'required|integer|min:1',
        ]);

        $question = AssessmentQuestion::create([
            'scholarship_id' => $this->scholarship_id,
            'question' => $this->question,
            'weight' => $this->weight,
        ]);


        foreach ($this->options as $option) {

            AssessmentQuestionOption::create([

                'assessment_question_id' => $question->id,

                'option_text' => $option['text'],

                'option_score' => $option['score'],
            ]);
        }

        $this->reset([
            'question',
            'weight',
            'options',
        ]);

        $this->options = [
            [
                'text' => '',
                'score' => 1,
            ],
            [
                'text' => '',
                'score' => 3,
            ],
        ];

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
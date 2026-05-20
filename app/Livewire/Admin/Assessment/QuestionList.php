<?php

namespace App\Livewire\Admin\Assessment;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentQuestionOption;

class QuestionList extends Component
{
    public Scholarship $scholarship;

    public $editingQuestionId = null;

    public $scholarship_id;

    public $question;

    public $weight = 10;

    public $options = [
        [
            'text' => '',
            'score' => 1,
            'roadmap' => '',
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
            'roadmap' => '',
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
            'options.*.roadmap' => 'required',
        ]);

        if ($this->editingQuestionId) {

            $question = AssessmentQuestion::findOrFail(
                $this->editingQuestionId
            );

            $question->update([

                'question' => $this->question,

                'weight' => $this->weight,
            ]);

        } else {

            $question = AssessmentQuestion::create([

                'scholarship_id' => $this->scholarship_id,

                'question' => $this->question,

                'weight' => $this->weight,
            ]);
        }


        foreach ($this->options as $option) {

            if (isset($option['id'])) {

                $existingOption =
                    AssessmentQuestionOption::find(
                        $option['id']
                    );

                if ($existingOption) {

                    $existingOption->update([

                        'option_text' =>
                            $option['text'],

                        'option_score' =>
                            $option['score'],

                        'roadmap_text' =>
                            $option['roadmap'],
                    ]);
                }

            } else {

                AssessmentQuestionOption::create([

                    'assessment_question_id' =>
                        $question->id,

                    'option_text' =>
                        $option['text'],

                    'option_score' =>
                        $option['score'],

                    'roadmap_text' =>
                        $option['roadmap'],
                ]);
            }
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
                'roadmap' => '',
            ],
            [
                'text' => '',
                'score' => 3,
                'roadmap' => '',
            ],
        ];

        $this->weight = 10;
        $this->editingQuestionId = null;
    }

    public function delete($id)
    {
        AssessmentQuestion::findOrFail($id)->delete();
    }

    public function edit($id)
    {
        $question =
            AssessmentQuestion::with('options')
            ->findOrFail($id);

        $this->editingQuestionId =
            $question->id;

        $this->question =
            $question->question;

        $this->weight =
            $question->weight;

        $this->options = [];

        foreach ($question->options as $option) {

            $this->options[] = [

                'id' => $option->id,

                'text' => $option->option_text,

                'score' => $option->option_score,

                'roadmap' => $option->roadmap_text,
            ];
        }
    }

    public function mount(
        Scholarship $scholarship
    )
    {
        $this->scholarship = $scholarship;

        $this->scholarship_id =
            $scholarship->id;
    }

    public function render()
    {
        $questions = AssessmentQuestion::where(
            'scholarship_id',
            $this->scholarship->id
        )->latest()->get();

        return view(
            'livewire.admin.assessment.question-list',
            [
                'questions' => $questions,

                'scholarship' => $this->scholarship,
            ]
        )->layout('layouts.admin');
    }
}
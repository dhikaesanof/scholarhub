<?php

namespace App\Livewire\Student\Assessment;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentResult;
use App\Models\AssessmentAnswer;

class TakeAssessment extends Component
{
    public Scholarship $scholarship;

    public $answers = [];

    public function mount(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function submit()
    {
        $questions = AssessmentQuestion::where(
            'scholarship_id',
            $this->scholarship->id
        )->get();

        $totalWeight = 0;

        foreach ($questions as $question) {

            $highestOptionScore =
                $question->options->max('option_score');

            $totalWeight += (
                $highestOptionScore
                * $question->weight
            );
        }

        $earnedScore = 0;

        foreach ($questions as $question) {

            $selectedOptionId =
                $this->answers[$question->id] ?? null;

            if ($selectedOptionId) {

                $option =
                    \App\Models\AssessmentQuestionOption::find(
                        $selectedOptionId
                    );

                if ($option) {

                    $earnedScore += (
                        $option->option_score
                        * $question->weight
                    );
                }
            }
        }

        $percentage = ($earnedScore / $totalWeight) * 100;

        $result = AssessmentResult::updateOrCreate(

            [
                'student_id' => auth()->user()->student->id,

                'scholarship_id' => $this->scholarship->id,
            ],

            [
                'readiness_percentage' => $percentage,
            ]
        );

        AssessmentAnswer::where(
            'assessment_result_id',
            $result->id
        )->delete();

        foreach ($questions as $question) {

            $selectedOptionId =
                $this->answers[$question->id] ?? null;

            $selectedOption =
                \App\Models\AssessmentQuestionOption::find(
                    $selectedOptionId
                );

            AssessmentAnswer::create([
                'assessment_result_id' => $result->id,

                'assessment_question_id' => $question->id,

                'assessment_question_option_id'=> $selectedOption?->id,

                'answer' => $selectedOption?->option_text,

                'score' => $selectedOption?->option_score ?? 0,
            ]);
        }

        return redirect(
            '/assessment/result/' . $result->id
        );
    }

    public function render()
    {
        return view(
            'livewire.student.assessment.take-assessment',
            [
                'questions' => AssessmentQuestion::where(
                    'scholarship_id',
                    $this->scholarship->id
                )->get(),
            ]
        )->layout('layouts.student');
    }
}
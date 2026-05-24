<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Scholarship;

use App\Models\AssessmentQuestion;

use App\Models\AssessmentQuestionOption;

class TanotoAssessmentSeeder extends Seeder
{
    public function run(): void
    {
        $scholarship =
            Scholarship::where(

                'title',

                'Tanoto Foundation Scholarship'
            )->first();

        // =========================
        // QUESTION 1
        // =========================

        $question1 =
            AssessmentQuestion::create([

                'scholarship_id' =>
                    $scholarship->id,

                'question' =>
                    'How often do you participate in organizational or leadership activities?',

                'weight' => 2,
            ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question1->id,

            'option_text' =>
                'Very active and regularly lead activities',

            'option_score' => 100,

            'roadmap_text' => null,
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question1->id,

            'option_text' =>
                'Occasionally participate in activities',

            'option_score' => 60,

            'roadmap_text' =>
                'Increase your involvement in leadership and organizational activities.',
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question1->id,

            'option_text' =>
                'Rarely or never participate',

            'option_score' => 20,

            'roadmap_text' =>
                'Start joining organizations or volunteering programs to build leadership experience.',
        ]);

        // =========================
        // QUESTION 2
        // =========================

        $question2 =
            AssessmentQuestion::create([

                'scholarship_id' =>
                    $scholarship->id,

                'question' =>
                    'How prepared is your scholarship essay or personal statement?',

                'weight' => 3,
            ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question2->id,

            'option_text' =>
                'Already finalized and reviewed',

            'option_score' => 100,

            'roadmap_text' => null,
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question2->id,

            'option_text' =>
                'Draft already exists but needs improvement',

            'option_score' => 70,

            'roadmap_text' =>
                'Improve and refine your scholarship essay draft.',
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question2->id,

            'option_text' =>
                'Have not started yet',

            'option_score' => 20,

            'roadmap_text' =>
                'Start drafting your scholarship essay and define your personal story.',
        ]);

        // =========================
        // QUESTION 3
        // =========================

        $question3 =
            AssessmentQuestion::create([

                'scholarship_id' =>
                    $scholarship->id,

                'question' =>
                    'How complete are your scholarship supporting documents?',

                'weight' => 2,
            ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question3->id,

            'option_text' =>
                'All documents are complete',

            'option_score' => 100,

            'roadmap_text' => null,
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question3->id,

            'option_text' =>
                'Some documents are missing',

            'option_score' => 60,

            'roadmap_text' =>
                'Complete your missing scholarship documents.',
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question3->id,

            'option_text' =>
                'Documents are not prepared yet',

            'option_score' => 20,

            'roadmap_text' =>
                'Prepare your CV, transcript, certificates, and recommendation letters.',
        ]);

        // =========================
        // QUESTION 4
        // =========================

        $question4 =
            AssessmentQuestion::create([

                'scholarship_id' =>
                    $scholarship->id,

                'question' =>
                    'How confident are you in scholarship interviews?',

                'weight' => 3,
            ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question4->id,

            'option_text' =>
                'Very confident and experienced',

            'option_score' => 100,

            'roadmap_text' => null,
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question4->id,

            'option_text' =>
                'Somewhat confident',

            'option_score' => 70,

            'roadmap_text' =>
                'Practice mock interviews with mentors or peers.',
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question4->id,

            'option_text' =>
                'Not confident at all',

            'option_score' => 20,

            'roadmap_text' =>
                'Learn common scholarship interview questions and start practicing regularly.',
        ]);

        // =========================
        // QUESTION 5
        // =========================

        $question5 =
            AssessmentQuestion::create([

                'scholarship_id' =>
                    $scholarship->id,

                'question' =>
                    'How strong is your academic performance?',

                'weight' => 2,
            ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question5->id,

            'option_text' =>
                'Excellent GPA and achievements',

            'option_score' => 100,

            'roadmap_text' => null,
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question5->id,

            'option_text' =>
                'Average academic performance',

            'option_score' => 60,

            'roadmap_text' =>
                'Improve academic consistency and participate in academic competitions.',
        ]);

        AssessmentQuestionOption::create([

            'assessment_question_id' =>
                $question5->id,

            'option_text' =>
                'Academic performance needs major improvement',

            'option_score' => 20,

            'roadmap_text' =>
                'Focus on improving GPA and academic achievements.',
        ]);
    }
}
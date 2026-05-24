<?php

namespace App\Livewire\Student\Roadmap;

use Livewire\Component;

use App\Models\AssessmentResult;

class RoadmapHistory extends Component
{
    public function render()
    {
        $results = AssessmentResult::with([

            'scholarship',

            'roadmaps',
        ])

        ->where(

            'student_id',

            auth()->user()->student->id
        )

        ->latest()

        ->get()

        ->map(function ($result) {

            $total =
                $result->roadmaps->count();

            $completed =
                $result->roadmaps
                    ->where(
                        'is_completed',
                        true
                    )
                    ->count();

            $result->progress =
                $total > 0

                ? round(
                    (
                        $completed / $total
                    ) * 100
                )

                : 0;

            return $result;
        });

        return view(

            'livewire.student.roadmap.roadmap-history',

            [

                'results' =>
                    $results,
            ]

        )->layout(
            'layouts.student'
        );
    }
}
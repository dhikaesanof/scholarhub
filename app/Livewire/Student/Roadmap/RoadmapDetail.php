<?php

namespace App\Livewire\Student\Roadmap;

use Livewire\Component;

use App\Models\AssessmentResult;

use App\Models\AssessmentRoadmap;

class RoadmapDetail extends Component
{
    public $result;

    public $roadmaps = [];

    public $progress = 0;

    public function mount()
    {
        $this->result =
            AssessmentResult::where(

                'student_id',

                auth()->user()->student->id
            )
            ->latest()
            ->first();

        if (!$this->result) {

            return;
        }

        $this->loadRoadmaps();
    }

    public function loadRoadmaps()
    {
        $this->roadmaps =
            $this->result
                ->roadmaps()
                ->latest()
                ->get();

        $this->calculateProgress();
    }

    public function calculateProgress()
    {
        $total =
            $this->roadmaps->count();

        $completed =
            $this->roadmaps
                ->where(
                    'is_completed',
                    true
                )
                ->count();

        $roadmapCompletion =
            $total > 0

            ? ($completed / $total)

            : 0;

        $baseScore =
            $this->result
                ->readiness_percentage;

        $this->progress = round(

            $baseScore +

            (
                (100 - $baseScore)

                * $roadmapCompletion
            )
        );
    }

    public function toggleRoadmap($id)
    {
        $roadmap =
            AssessmentRoadmap::findOrFail($id);

        $roadmap->update([

            'is_completed' =>
                !$roadmap->is_completed,
        ]);

        $this->loadRoadmaps();
    }

    public function render()
    {
        return view(
            'livewire.student.roadmap.roadmap-detail'
        )
        ->layout('layouts.student');
    }
}
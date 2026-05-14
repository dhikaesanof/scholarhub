<?php

namespace App\Livewire\Student\Scholarship;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\Bookmark;

class ScholarshipList extends Component
{
    public $search = '';

    public $status = '';

    public $category = '';

    public function bookmark($scholarshipId)
    {
        Bookmark::firstOrCreate([
            'student_id' => auth()->user()->student->id,
            'scholarship_id' => $scholarshipId,
        ]);
    }

    public function isBookmarked($scholarshipId)
    {
        return Bookmark::where(
            'student_id',
            auth()->user()->student->id
        )
        ->where(
            'scholarship_id',
            $scholarshipId
        )
        ->exists();
    }
    
    public function removeBookmark($scholarshipId)
    {
        Bookmark::where(
            'student_id',
            auth()->user()->student->id
        )
        ->where(
            'scholarship_id',
            $scholarshipId
        )
        ->delete();
    }

    public function render()
    {
        $scholarships = Scholarship::query()

            ->when($this->search, function ($query) {

                $query->where(function ($q) {

                    $q->where('title', 'like', '%' . $this->search . '%')

                    ->orWhere('provider', 'like', '%' . $this->search . '%');

                });

            })

            ->when($this->status, function ($query) {

                $query->where('status', $this->status);

            })

            ->when($this->category, function ($query) {

                $query->where('category', $this->category);

            })

            ->latest()

            ->get();

        return view(
            'livewire.student.scholarship.scholarship-list',
            [
                'scholarships' => $scholarships
            ]
        )->layout('layouts.student');
    }
}
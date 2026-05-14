<?php

namespace App\Livewire\Student\Scholarship;

use Livewire\Component;
use App\Models\Scholarship;

class ScholarshipDetail extends Component
{
    public Scholarship $scholarship;

    public function mount(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function render()
    {
        return view(
            'livewire.student.scholarship.scholarship-detail'
        )->layout('layouts.student');
    }
}
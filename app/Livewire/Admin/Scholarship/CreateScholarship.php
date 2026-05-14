<?php

namespace App\Livewire\Admin\Scholarship;

use Livewire\Component;
use App\Models\Scholarship;

class CreateScholarship extends Component
{
    public $title;

    public $provider;

    public $description;

    public $deadline;

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        Scholarship::create([
            'title' => $this->title,
            'provider' => $this->provider,
            'description' => $this->description,
            'requirements' => null,
            'education_level' => 'Bachelor',
            'category' => 'Academic',
            'funding_type' => 'Full Funded',
            'deadline' => $this->deadline,
            'status' => 'OPEN',
            'created_by' => 1,
        ]);

        return redirect('/admin/scholarships');
    }

    public function render()
    {
        return view(
            'livewire.admin.scholarship.create-scholarship'
        )->layout('layouts.admin');
    }
}
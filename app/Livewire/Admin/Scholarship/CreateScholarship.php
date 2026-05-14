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

    public $benefits;

    public $requirements;

    public $minimum_gpa;

    public $required_documents;

    public $education_level;

    public $category;

    public $funding_type;

    public $registration_open_date;

    public $announcement_date;

    public $registration_link;

    public $status = 'OPEN';

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'benefits' => 'nullable',
            'requirements' => 'nullable',
            'minimum_gpa' => 'nullable|numeric',
            'required_documents' => 'nullable',
            'education_level' => 'required',
            'category' => 'required',
            'funding_type' => 'required',
            'registration_open_date' => 'nullable|date',
            'deadline' => 'required|date',
            'announcement_date' => 'nullable|date',
            'registration_link' => 'nullable|url',
            'status' => 'required',
        ]);

        Scholarship::create([
            'title' => $this->title,
            'provider' => $this->provider,
            'description' => $this->description,
            'benefits' => $this->benefits,
            'requirements' => $this->requirements,
            'minimum_gpa' => $this->minimum_gpa,
            'required_documents' => $this->required_documents,
            'education_level' => $this->education_level,
            'category' => $this->category,
            'funding_type' => $this->funding_type,
            'registration_open_date' => $this->registration_open_date,
            'deadline' => $this->deadline,
            'announcement_date' => $this->announcement_date,
            'registration_link' => $this->registration_link,
            'status' => $this->status,
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
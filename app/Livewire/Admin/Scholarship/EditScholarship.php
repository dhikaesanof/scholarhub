<?php

namespace App\Livewire\Admin\Scholarship;

use Livewire\Component;
use App\Models\Scholarship;

class EditScholarship extends Component
{
    public Scholarship $scholarship;

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

    public function mount(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;

        $this->title = $scholarship->title;

        $this->provider = $scholarship->provider;

        $this->description = $scholarship->description;

        $this->deadline = $scholarship->deadline;

        $this->benefits = $scholarship->benefits;

        $this->requirements = $scholarship->requirements;

        $this->minimum_gpa = $scholarship->minimum_gpa;

        $this->required_documents = $scholarship->required_documents;

        $this->education_level = $scholarship->education_level;

        $this->category = $scholarship->category;

        $this->funding_type = $scholarship->funding_type;

        $this->registration_open_date = $scholarship->registration_open_date;

        $this->announcement_date = $scholarship->announcement_date;

        $this->registration_link = $scholarship->registration_link;

        $this->status = $scholarship->status;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'benefits' => 'required',
            'requirements' => 'required',
            'minimum_gpa' => 'required|numeric|min:0|max:4',
            'required_documents' => 'required',
            'education_level' => 'required',
            'category' => 'required',
            'funding_type' => 'required',
            'registration_open_date' => 'required|date',
            'announcement_date' => 'required|date',
            'registration_link' => 'required|url',
            'status' => 'required',
        ]);

        $this->scholarship->update([
            'title' => $this->title,
            'provider' => $this->provider,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'benefits' => $this->benefits,
            'requirements' => $this->requirements,
            'minimum_gpa' => $this->minimum_gpa,
            'required_documents' => $this->required_documents,
            'education_level' => $this->education_level,
            'category' => $this->category,
            'funding_type' => $this->funding_type,
            'registration_open_date' => $this->registration_open_date,
            'announcement_date' => $this->announcement_date,
            'registration_link' => $this->registration_link,
            'status' => $this->status,
        ]);

        return redirect('/admin/scholarships');
    }

    public function render()
    {
        return view(
            'livewire.admin.scholarship.edit-scholarship'
        )->layout('layouts.admin');
    }
}
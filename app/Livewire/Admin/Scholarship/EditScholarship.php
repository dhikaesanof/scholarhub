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

    public function mount(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;

        $this->title = $scholarship->title;

        $this->provider = $scholarship->provider;

        $this->description = $scholarship->description;

        $this->deadline = $scholarship->deadline;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $this->scholarship->update([
            'title' => $this->title,
            'provider' => $this->provider,
            'description' => $this->description,
            'deadline' => $this->deadline,
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
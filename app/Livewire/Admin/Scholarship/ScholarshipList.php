<?php

namespace App\Livewire\Admin\Scholarship;

use Livewire\Component;
use App\Models\Scholarship;

class ScholarshipList extends Component
{   

    public function delete($id)
    {
        Scholarship::findOrFail($id)->delete();
    }
    
    public function render()
    {
        $scholarships = Scholarship::latest()->get();

        return view('livewire.admin.scholarship.scholarship-list', [
            'scholarships' => $scholarships
        ])->layout('layouts.admin');
    }

}


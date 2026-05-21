<?php

namespace App\Livewire\Mentor;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view(
            'livewire.mentor.dashboard'
        )->layout('layouts.mentor');
    }
}
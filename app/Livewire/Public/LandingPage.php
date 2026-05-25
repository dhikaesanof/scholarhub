<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Scholarship;
use App\Models\Mentor;

class LandingPage extends Component
{
    public function render()
    {
        return view(

            'livewire.public.landing-page',

            [

                'scholarships' =>

                    Scholarship::latest()

                        ->take(3)

                        ->get(),

                'mentors' =>

                    Mentor::latest()

                        ->take(3)

                        ->get(),
            ]
        )->layout('layouts.public');
    }
}
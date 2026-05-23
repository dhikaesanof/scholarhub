<?php

namespace App\Livewire\Admin\Mentor;

use Livewire\Component;

use App\Models\Mentor;

class MentorEarnings extends Component
{
    public $earnings = [];

    public function mount()
    {
        $mentors =

            Mentor::with([
                'bookings'
            ])

            ->get();

        foreach ($mentors as $mentor) {

            $paidBookings =

                $mentor->bookings()

                    ->where(
                        'payment_status',
                        'PAID'
                    )

                    ->count();

            $this->earnings[] = [

                'mentor' =>
                    $mentor,

                'total_sessions' =>
                    $paidBookings,

                'income' =>
                    $paidBookings * 75000,
            ];
        }
    }

    public function render()
    {
        return view(

            'livewire.admin.mentor.mentor-earnings'

        )->layout(
            'layouts.admin'
        );
    }
}
<?php

namespace App\Livewire\Admin\Student;

use Livewire\Component;

use App\Models\User;

class StudentList extends Component
{
    public function toggleBlock($id)
    {
        $user =
            User::findOrFail($id);

        $user->update([

            'is_blocked' =>
                !$user->is_blocked,
        ]);
    }

    public function render()
    {
        return view(

            'livewire.admin.student.student-list',

            [

                'students' =>

                    User::where(
                        'role',
                        'STUDENT'
                    )

                    ->latest()

                    ->get(),
            ]
        )

        ->layout(
            'layouts.admin'
        );
    }
}
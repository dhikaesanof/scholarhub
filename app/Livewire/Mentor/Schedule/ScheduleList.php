<?php

namespace App\Livewire\Mentor\Schedule;

use Carbon\Carbon;

use Livewire\Component;

use App\Models\MentorAvailability;

class ScheduleList extends Component
{
    public $editingId = null;

    public $filterDate;

    public $date;

    public $start_time;

    public $end_time;

    public function delete($id)
    {
        $availability =
            MentorAvailability::findOrFail($id);

        if ($availability->is_booked) {

            session()->flash(
                'error',
                'Booked schedules cannot be deleted.'
            );

            return;
        }

        $availability->delete();
    }

    public function edit($id)
    {
        $availability =
            MentorAvailability::findOrFail($id);

        // BLOCK EDIT IF BOOKED

        if ($availability->is_booked) {

            session()->flash(
                'error',
                'Booked schedules cannot be edited.'
            );

            return;
        }

        $this->editingId =
            $availability->id;

        $this->date =
            $availability->date;

        $this->start_time =
            substr(
                $availability->start_time,
                0,
                5
            );

        $this->end_time =
            substr(
                $availability->end_time,
                0,
                5
            );
    }

    public function mount()
    {
        $this->filterDate =
            now()->toDateString();
    }

    public function save()
    {
        $this->validate([

            'date' => [

                'required',

                'date',

                'after_or_equal:today',

                'before_or_equal:' .
                    now()
                        ->addWeeks(2)
                        ->format('Y-m-d'),
            ],

            'start_time' => 'required',

            'end_time' => 'required',
        ]);

        $createdCount = 0;

        $duplicateCount = 0;

        $selectedDateTime =

            \Carbon\Carbon::parse(

                $this->date .
                ' ' .
                $this->start_time

            );

        if (
            $selectedDateTime->isPast()
        ) {

            session()->flash(

                'error',

                'Cannot create schedule in past time.'
            );

            return;
        }

        $overlapExists =

            MentorAvailability::where(
                'mentor_id',
                auth()->user()->mentor->id
            )

            ->when(

                $this->editingId,

                function ($query) {

                    $query->where(
                        'id',
                        '!=',
                        $this->editingId
                    );
                }
            )

            ->where(
                'date',
                $this->date
            )

            ->where(function ($query) {

                $query

                    ->whereBetween(
                        'start_time',

                        [
                            $this->start_time,
                            $this->end_time,
                        ]
                    )

                    ->orWhereBetween(
                        'end_time',

                        [
                            $this->start_time,
                            $this->end_time,
                        ]
                    );
            })

            ->exists();

        if ($overlapExists) {

            session()->flash(
                'error',
                'Schedule overlaps with another slot.'
            );

            return;
        }

        $mentor =
            auth()->user()->mentor;

        // UPDATE MODE

        if ($this->editingId) {

            $availability =
                MentorAvailability::findOrFail(
                    $this->editingId
                );

            if ($availability->is_booked) {

                session()->flash(
                    'error',
                    'Booked schedules cannot be updated.'
                );

                return;
            }

            $availability->update([

                'date' =>
                    $this->date,

                'start_time' =>
                    $this->start_time,

                'end_time' =>
                    $this->end_time,
            ]);

            $this->editingId = null;
        }

        // CREATE MODE

        else {

            $start =
                Carbon::parse(
                    $this->start_time
                );

            $end =
                Carbon::parse(
                    $this->end_time
                );

            $duplicateCount = 0;

            $createdCount = 0;  

            while ($start < $end) {

                $slotEnd =
                    $start
                    ->copy()
                    ->addHour();

                $exists =
                    MentorAvailability::where(
                        'mentor_id',
                        $mentor->id
                    )

                    ->where(
                        'date',
                        $this->date
                    )

                    ->where(
                        'start_time',
                        $start->format('H:i:s')
                    )

                    ->exists();

                if ($exists) {

                    $duplicateCount++;

                    $start->addHour();

                    continue;
                }

                MentorAvailability::create([

                    'mentor_id' =>
                        $mentor->id,

                    'date' =>
                        $this->date,

                    'start_time' =>
                        $start->format('H:i:s'),

                    'end_time' =>
                        $slotEnd->format('H:i:s'),

                    'is_booked' => false,
                ]);

                $createdCount++;

                $start->addHour();
            }
        }

        if ($createdCount > 0) {

            session()->flash(
                'success',

                $createdCount .
                ' schedule(s) created successfully.'
            );
        }

        if ($duplicateCount > 0) {

            session()->flash(
                'warning',

                $duplicateCount .
                ' duplicate slot(s) skipped.'
            );
        }

        $this->reset([

            'date',

            'start_time',

            'end_time',
        ]);
    }

    public function render()
    {
        $availabilities =
            auth()
            ->user()
            ->mentor
            ->availabilities()
            ->with('booking')

            ->when(
                $this->filterDate,
                function ($query) {

                    $query->where(
                        'date',
                        $this->filterDate
                    );
                }
            )

            ->orderBy('date')

            ->orderBy('start_time')

            ->get();

        return view(
            'livewire.mentor.schedule.schedule-list',
            [
                'availabilities'
                    => $availabilities,
            ]
        )->layout('layouts.mentor');
    }
}
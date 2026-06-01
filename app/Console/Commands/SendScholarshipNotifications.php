<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Scholarship;
use App\Models\EmailNotification;

use App\Notifications\ScholarshipOpeningSoonNotification;
use App\Notifications\ScholarshipClosingSoonNotification;

class SendScholarshipNotifications extends Command
{
    protected $signature =
        'scholarship:notifications';

    protected $description =
        'Send scholarship opening and closing notifications';

    public function handle()
    {

        $students = User::where(
            'role',
            'STUDENT'
        )->get();

        // OPENING SOON

        $openingSoon = Scholarship::whereDate(

            'registration_open_date',

            now()
                ->addDays(3)
                ->toDateString()

        )->get();

        foreach (
            $openingSoon
            as $scholarship
        ) {

            foreach (
                $students
                as $student
            ) {

                $alreadySent =

                    EmailNotification::where(

                        'user_id',

                        $student->id

                    )

                    ->where(

                        'scholarship_id',

                        $scholarship->id

                    )

                    ->where(

                        'type',

                        'OPENING'

                    )

                    ->exists();

                if ($alreadySent) {

                    continue;
                }

                $student->notify(

                    new ScholarshipOpeningSoonNotification(

                        $scholarship
                    )
                );

                EmailNotification::create([

                    'user_id' =>

                        $student->id,

                    'scholarship_id' =>

                        $scholarship->id,

                    'type' =>

                        'OPENING',
                ]);
            }
        }

        // CLOSING SOON

        $closingSoon = Scholarship::whereDate(

            'deadline',

            now()
                ->addDays(3)
                ->toDateString()

        )->get();

        foreach (
            $closingSoon
            as $scholarship
        ) {

            foreach (
                $students
                as $student
            ) {

                $alreadySent =

                    EmailNotification::where(

                        'user_id',

                        $student->id

                    )

                    ->where(

                        'scholarship_id',

                        $scholarship->id

                    )

                    ->where(

                        'type',

                        'CLOSING'

                    )

                    ->exists();

                if ($alreadySent) {

                    continue;
                }

                $student->notify(

                    new ScholarshipClosingSoonNotification(

                        $scholarship
                    )
                );

                EmailNotification::create([

                    'user_id' =>

                        $student->id,

                    'scholarship_id' =>

                        $scholarship->id,

                    'type' =>

                        'CLOSING',
                ]);
            }
        }

        $this->info(
            'Scholarship notifications sent.'
        );
    }
}
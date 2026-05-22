<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MentorBooking;

class CleanupExpiredBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-expired-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredBookings =

            MentorBooking::where(
                'payment_status',
                'PENDING'
            )

            ->where(
                'created_at',
                '<',
                now()->subMinutes(5)
            )

            ->get();

        foreach (
            $expiredBookings
            as $booking
        ) {

            $booking
                ->availability
                ->update([

                    'is_booked' => false,
                ]);

            $booking->update([

                'payment_status' =>
                    'EXPIRED',
            ]);
        }

        $this->info(
            'Expired bookings cleaned.'
        );
    }
}

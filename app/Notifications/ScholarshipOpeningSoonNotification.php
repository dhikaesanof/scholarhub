<?php

namespace App\Notifications;

use App\Models\Scholarship;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ScholarshipOpeningSoonNotification extends Notification
{
    use Queueable;

    public Scholarship $scholarship;

    public function __construct(
        Scholarship $scholarship
    ) {
        $this->scholarship =
            $scholarship;
    }

    public function via(
        object $notifiable
    ): array {
        return ['mail'];
    }

    public function toMail(
        object $notifiable
    ): MailMessage {

        return (new MailMessage)

            ->subject(
                'Scholarship Registration Opening Soon'
            )

            ->greeting(
                'Hello ' .
                $notifiable->name
            )

            ->line(
                $this->scholarship->title .
                ' registration opens within 3 days.'
            )

            ->action(
                'View Scholarship',
                url('/scholarships')
            )

            ->line(
                'Prepare your documents and apply on time.'
            );
    }
}
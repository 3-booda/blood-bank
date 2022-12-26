<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationRequesteNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $donationRequest;

    public function __construct($donationRequest)
    {
        $this->donationRequest = $donationRequest;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'donation_request_id' => $this->donationRequest->id,
            'title' => 'يوجد حالة تبرع قريبة منك',
            'content' => $this->donationRequest->bloodType->name . ' محتاج متبرع لفصيلة دم',
        ];
    }
}

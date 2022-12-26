<?php

namespace App\Listeners;

use App\Events\DontaionRequestCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DonationRequesteNotification;

class SendDonationRequestNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DontaionRequestCreated  $event
     * @return void
     */
    public function handle(DontaionRequestCreated $event)
    {
        $users = User::whereHas('favoreBloodyTypes', function ($query) use ($event) {
            $query->where('userable_id', $event->donationRequest->blood_type_id);
        })->whereHas('favoreProvinces', function ($query)  use ($event) {
            $query->where('userable_id', $event->donationRequest->city->province->id);
        })->get();

        Notification::send($users, new DonationRequesteNotification($event->donationRequest));
    }
}

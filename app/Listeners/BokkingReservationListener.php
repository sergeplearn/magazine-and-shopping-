<?php

namespace App\Listeners;

use App\Events\BokkingReservationEvent;
use App\Mail\SendReservarionMessage;
use App\Notifications\ReservationNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class BokkingReservationListener implements ShouldQueue
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
     * @param  BokkingReservationEvent  $event
     * @return void
     */
    public function handle(BokkingReservationEvent $event)
    {

        foreach (User::where('role',1)->cursor() as $user) {
            $user->Notify(new ReservationNotification($event->event));
        }
        //$event = $event->event;
       // Mail::to('serge7676@gmail.com')->send(new SendReservarionMessage($event));
    }
}

<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewUserHasRegisterListener implements ShouldQueue
{


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       $newuser = $event->newuser;
        Mail::to($event->newuser->email)->send(new WelcomeNewUserMail($newuser));
    }
}

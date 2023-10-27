<?php

namespace App\Listeners;

use App\Events\NewUserHasRegisterEvent;
use App\Notifications\AdminNotificationForNewUser;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminthrougSlackListener implements ShouldQueue
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
     * @param  NewUserHasRegisterEvent  $event
     * @return void
     */
    public function handle(NewUserHasRegisterEvent $event)
    {

foreach (User::where('role',1)->cursor() as $user) {
    $user->Notify(new AdminNotificationForNewUser($event->newuser));
}
    }
}

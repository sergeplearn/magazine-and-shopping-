<?php

namespace App\Providers;

use App\Providers\NewUserHasRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserHasRegisterNotification
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
     * @param  NewUserHasRegister  $event
     * @return void
     */
    public function handle(NewUserHasRegister $event)
    {
        //
    }
}

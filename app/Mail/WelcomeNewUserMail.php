<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewUserMail extends Mailable
{
    use Queueable, SerializesModels;
public $newuser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newuser)
    {
        $this->newuser = $newuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Welcome');
    }
}

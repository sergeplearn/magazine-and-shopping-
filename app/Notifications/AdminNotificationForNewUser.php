<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminNotificationForNewUser extends Notification
{
    use Queueable;
   public $newuser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newuser)
    {
        $this->newuser = $newuser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notification)
    {
        return [
            'name'=>$this->newuser->name,
        'user_id'=>'has just registed',
            'email'=>$this->newuser->email,
        ];
    }


}

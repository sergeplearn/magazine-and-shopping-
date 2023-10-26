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
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))

                  ->greeting("New Chirp from {$this->newuser->name}")
        ->line('Thank you for using our  application!');
    }

    public function toDatabase($notification)
    {
        return [
            'name'=>$this->newuser->name,
        'user_id'=>'has just registed',
            'email'=>$this->newuser->email,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

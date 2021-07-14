<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewShop extends Notification
{
    use Queueable;
    private $lastname = null;
    private $username = null;
    private $pass = null;


    public function __construct($lastname, $username, $pass)
    {
        $this->lastname = $lastname;
        $this->username = $username;
        $this->pass = $pass;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line(__('Mr/Ms'))
                    ->line($this->lastname)
                    ->line(__('Your Account has been registered with credential below'))
                    ->line("Username: $this->username \n password: $this->pass")
                    ->action(__('Enter Account'), url('/login'))
                    ->line(__('Thank you for using our application!'));
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

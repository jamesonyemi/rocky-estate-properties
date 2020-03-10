<?php

namespace App\Notifications\Clients;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CorporateClientLoginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $email;
    public $secretKey;
    public $company_name;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $secretKey, $company_name)
    {
        $this->email = $email;
        $this->secretKey = $secretKey;
        $this->company_name = $company_name;
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
        $url    = url('corporateClientlogin');
        
        return (new MailMessage)->greeting('Hello  '. $this->company_name)
                ->subject('Corporate Client Login')
                ->line('Your Email Address:  ' . $this->email)
                ->line('Your Password:  ' . $this->secretKey)
                ->action('Client Login', $url)
                ->line('Thank you for using  '.config('app.name').' !');
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

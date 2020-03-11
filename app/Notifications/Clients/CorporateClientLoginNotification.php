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
        $url    = url('corporate-login-form');
        $recipient_name = $this->company_name;
        $recipient_email = $this->email;
        $recipient_secretKey = $this->secretKey;
        
        return (new MailMessage)->greeting('Hello  '. $recipient_name)
                ->subject('Corporate Client Login')
                ->line('Your Email Address:  ' . $recipient_email)
                ->line('Your Password:  ' . $recipient_secretKey)
                ->view('mail-template.corporate-client', compact('recipient_email', 'recipient_secretKey', 'recipient_name', 'url'));
                // ->action('Client Login', $url)
                // ->line('Thank you for using  '.config('app.name').' !');
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

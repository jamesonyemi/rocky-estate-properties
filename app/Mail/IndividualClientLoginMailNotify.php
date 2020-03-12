<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IndividualClientLoginMailNotify extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected static $email;
    protected static $secretKey;
    public static $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $email, $password, $client )
    {
        static::$email      =   $email;
        static::$secretKey  =   $password;
        static::$client     =   $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail-template.client-login-journey');
    }
}

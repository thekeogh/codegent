<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Declare fields
     */
    public $name;
    public $email;
    public $type;
    public $message;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $type, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to('steve@screen.cloud')
            ->subject('Hello from Codegent')
            ->view('emails.contact');
    }
}

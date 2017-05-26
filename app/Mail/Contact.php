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
    public $enquiry;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $type, $enquiry)
    {
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->address())
            ->subject("{$this->type} enquiry from codegent.com")
            ->attach($this->cv())
            ->view('emails.contact');
    }
    
    /**
     * Upload a cv and return the path
     * 
     * @return string
     */
    protected function cv()
    {
        $cv = request()->file('cv');
        if (! $cv) return;
        $uploaded = $cv->store('cv');
        return config('filesystems.disks.local.root') . '/' . $uploaded;
    }
    
    /**
     * Fetch the email to address based on the type
     * 
     * @return string
     */
    protected function address()
    {
        switch ($this->type) {
            case 'Products':
                return env('MAIL_FROM_PRODUCTS');
            break;
            case 'Agency':
                return env('MAIL_FROM_AGENCY');
            break;
            default:
                return env('MAIL_FROM_HELLO');
            break;
        }
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelloWorldMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        // No properties needed for static content
    }

    public function build()
    {
        return $this->view('emails.orders.hello_world')
                    ->subject('Hello World Email')
                    ->with([
                        'message' => 'Hello, World!', // Static message
                    ]);
    }
}

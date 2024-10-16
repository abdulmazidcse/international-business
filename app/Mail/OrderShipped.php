<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (is_null($this->order->invoice_number) || is_null($this->order->pan_number)) {
            throw new \Exception('Order properties are not set correctly.');
        }
        return $this->view('emails.orders.shipped')
                    ->with([
                        'orderName' => $this->order->invoice_number,
                        'orderPrice' => $this->order->pan_number,
                    ]);
    }
}

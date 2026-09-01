<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $type;

    public function __construct(Order $order, string $type)
    {
        $this->order = $order;
        $this->type = $type;
    }

    public function build()
    {
        $subject = match ($this->type) {

            'placed' => 'Your Order Has Been Placed',

            'confirmed' => 'Your Order Has Been Confirmed',

            'fulfilled' => 'Your Order Has Been Fulfilled',

            'shipped' => 'Your Order Has Been Shipped',

            'delivered' => 'Your Order Has Been Delivered',

            'cancelled' => 'Your Order Has Been Cancelled',

            default => 'Order Update',
        };

        return $this->subject($subject)
            ->view('emails.order-status');
    }
}


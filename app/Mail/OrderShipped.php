<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
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
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $order)
    {
        return $this
            ->from('no-reply@admin@livewire-ecommerce.com')
            ->subject('Spedizione avvenuta N. ORDINE #' .$this->order->order_number )
            ->markdown('emails.orderShipped')->with('order', $this->order);
    }
}

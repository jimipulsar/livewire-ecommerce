<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailProduct extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $data)
    {

        return $this
            ->from('no-reply@admin@livewire-ecommerce.com', $data->name)
//            ->to('pietro@mwspace.com')
            ->to('acquisti@admin@livewire-ecommerce.com')
            ->subject("Richiesta info per $data->item_name - admin@livewire-ecommerce.com")
            ->markdown('emails.sendmailProduct')->with('data', $this->data);
    }
}

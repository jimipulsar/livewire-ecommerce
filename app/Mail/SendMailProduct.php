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
            ->from('no-reply@github.com', $data->name)
//            ->to('jimipulsar@github.com')
            ->to('jimipulsar@github.com')
            ->subject("Richiesta info per $data->item_name - jimipulsar@github.com")
            ->markdown('emails.sendmailProduct')->with('data', $this->data);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SignUpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
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
            ->from('no-reply@github.com')
//            ->to('jimipulsar@github.com')
            ->to('jimipulsar@github.com')
            ->subject("Nuova registrazione da ". config('app.name'))
            ->markdown('emails.signup')->with('data', $this->data);
    }
}

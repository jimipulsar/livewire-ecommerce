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
            ->from('no-reply@admin@livewire-ecommerce.com')
//            ->to('pietro@mwspace.com')
            ->to('acquisti@admin@livewire-ecommerce.com')
            ->subject("Nuova registrazione da ". config('app.name'))
            ->markdown('emails.signup')->with('data', $this->data);
    }
}

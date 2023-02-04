<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $tokens;
    public $newsletter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter)
    {

        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $newsletter)
    {

        return $this
            ->from('no-reply@admin@livewire-ecommerce.com')
            ->subject('Iscrizione alla newsletter del sito web admin@livewire-ecommerce.com' )
            ->markdown('emails.newsletter')->with('newsletter', $this->newsletter);
    }
}

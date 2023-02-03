<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordToken extends Notification
{

    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Reimposta password")
            ->line("Hai ricevuto questa email perché abbiamo ricevuto una richiesta di reimpostazione della password per il tuo account.")
            ->action('Resetta Password', url(app()->getLocale() . '/password/reset', $this->token))
            ->line('Questo link per la reimpostazione della password scadrà tra 60 minuti.')
            ->line('Se non hai richiesto la reimpostazione della password, non sono necessarie ulteriori azioni.');

    }
}

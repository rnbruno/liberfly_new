<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailableName extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Criar uma nova instância de mensagem.
     *
     * @return void
     */
    public function __construct(private $link){ }

    /**
     * Obter o envelope da mensagem.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Confirmation mail',
        );
    }

    /**
     * Obter a definição do conteúdo da mensagem.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.confirmation',
            with: ['link' => $this->link],
        );
    }

    /**
     * Obter os anexos da mensagem.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            
        ];

    }
}

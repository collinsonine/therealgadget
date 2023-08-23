<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $code, $email;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $code, $email)
    {
        $this->name = $name;
        $this->code = $code;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
                from: new Address('no-reply@therealgadgets.com', 'The Real Gadgets'),
                subject: 'Email Verification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.verifymail',
            with: [
                'name' => $this->name,
                'code' => $this->code,
                'email' => $this->email,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

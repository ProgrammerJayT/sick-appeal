<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SickTest extends Mailable
{
    use Queueable, SerializesModels;

    public $lecturer, $module, $deadline;

    /**
     * Create a new message instance.
     */
    public function __construct($lecturer, $module, $deadline)
    {
        //
        $this->lecturer = $lecturer;
        $this->module = $module;
        $this->deadline = $deadline;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sick Test Applications Open',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mails.sick-test')
            ->subject('Sick test applications now open')
            ->with([
                'lecturer' => $this->lecturer,
                'module' => $this->module,
                'deadline' => $this->deadline,
            ]);
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

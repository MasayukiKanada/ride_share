<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\User;

class ReserveConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contract;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contract, $user)
    {
        $this->contract = $contract;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {

        $envelope = new Envelope();

        return $envelope->subject(config('app.name').'予約が完了しました')
            ->from('from@example.com', config('app.name'))
            ->to($this->user->email);
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $content = new Content();

        return $content->view('emails.reserveConfirm');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

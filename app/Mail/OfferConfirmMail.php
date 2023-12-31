<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Driver;

class OfferConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $offer;
    public $driver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offer, $driver)
    {
        $this->offer = $offer;
        $this->driver = $driver;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $envelope = new Envelope();
        $to = array($this->driver->email,'demo@e-rideshare.rojo.jp');

        return $envelope->subject(config('app.name').' オファー登録が完了しました')
            ->from('demo@e-rideshare.rojo.jp', config('app.name'))
            ->to($to);
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.offerConfirm',
            with:[
                'contract' => $this->offer,
                'user' => $this->driver,
            ]
        );
        // $content = new Content();

        // return $content->view('emails.offerConfirm');
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

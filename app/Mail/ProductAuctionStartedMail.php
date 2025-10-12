<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductAuctionStartedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $owner;
    public $auction;

    public function __construct($product, $owner, $auction)
    {
        $this->product = $product;
        $this->owner   = $owner;
        $this->auction = $auction; 
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your product is now up for auction!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.productAuctionStarted',
            with: [
                'product' => $this->product,
                'owner'   => $this->owner,
                'auction' => $this->auction, 
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

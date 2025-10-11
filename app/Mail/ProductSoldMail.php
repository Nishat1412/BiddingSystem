<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductSoldMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $winner;
    public $auction;

    public function __construct($product, $winner, $auction = null)
    {
        $this->product = $product;
        $this->winner  = $winner;
        $this->auction = $auction;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your product has been sold!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.productSold',
            with: [
                'product' => $this->product,
                'winner'  => $this->winner,
                'auction' => $this->auction,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

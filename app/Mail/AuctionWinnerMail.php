<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuctionWinnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $winner;
    public $auction;
    public $owner;

    public function __construct($product, $winner, $auction = null, $owner = null)
    {
        $this->product = $product;
        $this->winner  = $winner;
        $this->auction = $auction;
        $this->owner   = $owner;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Congratulations — you won the auction!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.auctionWinner',
            with: [
                'product' => $this->product,
                'winner'  => $this->winner,
                'auction' => $this->auction,
                'owner'   => $this->owner, 
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

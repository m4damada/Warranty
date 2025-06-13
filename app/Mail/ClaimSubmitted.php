<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;

    /**
     * Create a new message instance.
     *
     * @param $claim
     */
    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to the DrARTEX Family')
                    ->view('emails.claim_submitted');
    }
}

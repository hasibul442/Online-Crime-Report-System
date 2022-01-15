<?php

namespace App\Mail;

use App\Models\Complain;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplainMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complain;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($complain)
    {
        $this->complain = $complain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Complain Registration')->view('frontend.mail.complainmail');
    }
}

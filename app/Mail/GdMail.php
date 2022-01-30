<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GdMail extends Mailable
{
    use Queueable, SerializesModels;

    public $genarel_diary;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($genarel_diary)
    {
        $this->genarel_diary = $genarel_diary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Genarl Diary')->view('frontend.mail.gbmail');
    }
}

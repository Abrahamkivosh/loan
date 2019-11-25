<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class adminEmailClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $message;
    public $bank;
    public function __construct( $subject, $message , $bank)
    {
        $this->subject = $subject;
        $this->message = $message;

        $this->bank = $bank;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->subject;
        $message = $this->message;

        $bank = $this->bank;
        $from = $this->from;
        return $this->from(Auth::user()->email,Auth::user()->name)
        ->markdown('adminEmailClient',compact('message','bank'))

        ->subject($subject);
    }
}

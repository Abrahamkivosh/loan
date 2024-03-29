<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class adminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message ;
    public $subject ;
    public function __construct($message,$subject)
    {
        $this->message = $message;
         $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->message;
        $subject = $this->subject;

        return $this->from(Auth::user()->email, Auth::user()->name)
        ->subject($subject)
        -> markdown('adminMail',compact('message'));
    }
}

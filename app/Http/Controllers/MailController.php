<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function show(){
        return view('mails.show');
    }

    public function send(Request $request){

        $this->validate($request,[
            'subject'=>"required|string",
            'message'=>"required|string"
        ]);
        $subject = $request->subject;
        $mess = $request->message;
        $from =  Auth::user()->email;

        Mail::to("abrahamkivosh@gmail.com")
            ->send(new adminMail($mess,$subject));

            // Mail::raw($mess, function ($message) use($request) {
            //     $message->from(Auth::user()->email, Auth::user()->name);
            //     $message->sender('abrahamkivosh@gmail.com', 'Abraham Kivondo');
            //     $message->to('abrahamkivosh@gmail.com', 'Abraham Kivondo');
            //     // $message->cc('john@johndoe.com', 'John Doe');
            //     // $message->bcc('john@johndoe.com', 'John Doe');
            //     $message->replyTo(Auth::user()->email, Auth::user()->name);
            //     $message->subject($request->subject);
            //     $message->priority(3);
            //     // $message->attach('pathToFile');
            // });
            return redirect()->back()->with("success","Mail send");
        //return view('mails.show');
    }
}

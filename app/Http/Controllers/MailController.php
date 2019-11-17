<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use Illuminate\Http\Request;

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
        $message = $request->subject;

        Mail::to("abrahamkivosh@gmail.com")
             ->from( Auth::user()->email )
            ->cc("kivoshkivosh1@gmail.com")
            ->send(new adminMail($message))->subject($subject);

        //return view('mails.show');
    }
}

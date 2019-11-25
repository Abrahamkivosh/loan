<?php

namespace App\Http\Controllers;
use App\Loan;
use App\Admin;
use JsonSerializable;
use Illuminate\Http\Request;
use App\Mail\adminEmailClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AdminLoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allLoans(){
        $bank = Auth::user()->bank;

      $loans =   Loan::where('bank_id', Auth::user()->bank->id)
           ->orderBy('id', 'desc')
           ->get();

        return view('admin.loan.allloans', compact('bank' , 'loans'));

    }
    public function approve( Request $re ,$id){
        $status = $re->input('status');
        $loan = Loan::where('id', $id)->update(['status' => $status ]);

       if ($loan) {
           return back()->with('success',"Loan approved");
       } else {
        return back()->with('error',"Try again error occurred");
       }
    }

    public function cancel( Request $re ,$id){
        $status = $re->input('status');
        $loan = Loan::where('id', $id)->update(['status' => $status ]);

       if ($loan) {
           return back()->with('success',"Loan Cancelled");
       } else {
        return back()->with('error',"Try again error occurred");
       }
    }



    public function deleteloan($id){
        $re = Loan::findOrfail($id)->delete();
        if ($re) {
             return redirect()->back()->with("success","Loan request deleted successfully");
        } else {
            return redirect()->back()->with("error","Error occurred , please try again");
        }


    }

    public function showMail(){
        $bank_id = Auth()->user()->bank->id ;
        $loans = Loan::where('bank_id', $bank_id)->get();
        return view('admin.mail',compact('loans'));
    }
    public function sendMail(Request $re){
        $admin = Auth::User();
        request()->validate(array(
            'email' => 'required|email',
            'subject'=>"required|string|max:200",
            'message'=>"required|string"
        ));
        $to = $re->input('email');
        $subject = $re->input('subject');
        $message = $re->input('message');
        $bank = Auth::user()->bank->name;


        Mail::to($to)->send(new adminEmailClient($subject,$message,$bank));

        return redirect()->back()->with("success","Mail send successfully");

    }

}

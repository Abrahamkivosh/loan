<?php

namespace App\Http\Controllers;
use App\Loan;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

class AdminLoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allLoans(){
        $bank = Auth::user()->bank;

        return view('admin.loan.allloans', compact('bank'));

    }
    public function approve( Request $re ,$id){
        $status = $re->input('status');
        $loan = Loan::where('id', $id)->update(['status' => $status ]);

       if ($loan) {
           return back()->with('success',"Loan approved");
       } else {
        return back()->with('error',"Loan Cancelled");
       }



    }

}

<?php

namespace App\Http\Controllers;
use App\Loan;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function approve(Request $re){


    }

}

<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::orderBy('id', 'DESC')->where('user_id',Auth::user()->id)->get();;
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks= Bank::all();
        return view('loans.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(array(
            'bank' => 'required',
            'amount'=> 'required|numeric|max:10000000'
        ));
        $data = new Loan();
        $data->user_id = Auth::user()->id;
        $data->bank_id = $request->bank;
        $data->amount = $request->amount;
        $data->status = "0";
        $data->description = $request->description ;
        $result =  $data->save();

        if ($result) {
            return redirect()->route('loans.index')->with("success","Loan request sent wait for response");
        } else {
            return back()->withInput();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        $loan = Loan::findOrfail($loan->id);
        return view('loans.show', compact('loan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        request()->validate(array(
            'bank' => 'required',
            'amount'=> 'required|numeric|max:10000000'
        ));
        $data = Loan::findOrfail($loan->id);
        $data->user_id = Auth::user()->id;
        $data->bank_id = $request->bank;
        $data->amount = $request->amount;
        $data->status = "0";
        $data->description = $request->description ;
        $result =  $data->save();

        if ($result) {
            return redirect()->route('loans.index')->with("success","Loan Updated successfully");
        } else {
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan = Loan::findOrfail($loan->id);
        $re = $loan->delete();

        if ($re) {
            # code...
            return redirect()->route('loans.index')->with('success',"Loan deleted ");
        } else {
         return redirect()->back()->withInput();
        }



    }
}

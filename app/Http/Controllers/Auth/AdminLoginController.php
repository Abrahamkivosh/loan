<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm(){
        return view('AdminAuth.login');
        //return "okay";
    }

    public function login(Request $request){
        //validate the data
        $this->validate($request,[
            'email' => 'required', 'string', 'email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password =  $request->input('password');
        //attempt to login using admin guard
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password],$request->remember)) {
            return  redirect()->intended(route('admin.dashboard'));
        } else {
            # code...
            return redirect()-> back()->withInput();
        }

        //redirect
    }
    public function guard(){
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect(route('admin.login'));
    }

}

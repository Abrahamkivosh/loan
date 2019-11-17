<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AdminResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/administrator';

    /**
     * Create a new controller instance.
     *
     * @return voidhome
     */
    //specify guard to use
    public function guard(){
        return Auth::guard('admin');
    }
    public function __construct()
    {
        $this->middleware('guest:admin');//specify guard you are using
    }
    protected function broker()
    {
       return Password::broker('admins');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.adminreset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}

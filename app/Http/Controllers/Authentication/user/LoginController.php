<?php

namespace App\Http\Controllers\Authentication\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
           'email'=>['required','string','email','max:255'],
           'password'=>['required','string','min:8'],
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
      
        if (auth()->guard('web')->attempt($credentials, $remember)) {
            return redirect()->intended(route('user.services'));
        }
        return back()->withInput($request->only('email'))->with('error', 'Invalid email or password');

    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('user.login.show');
    }
}

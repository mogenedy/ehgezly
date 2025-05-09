<?php

namespace App\Http\Controllers\Authentication\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (auth()->guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Admin logged in successfully');
        }
        return back()->withInput($request->only('email'));
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

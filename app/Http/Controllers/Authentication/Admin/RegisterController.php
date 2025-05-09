<?php

namespace App\Http\Controllers\Authentication\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        Admin::create($request->validated());
        return redirect()->route('admin.login')->with('success', 'Admin registered successfully');
    }
}

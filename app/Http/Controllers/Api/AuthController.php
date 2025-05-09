<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::guard('user')->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $user = Auth::guard('user')->user();
        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::guard('admin')->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $admin = Auth::guard('admin')->user();
        $token = $admin->createToken('admin_token')->plainTextToken;
        return response()->json(['token' => $token, 'admin' => $admin]);
    }
}

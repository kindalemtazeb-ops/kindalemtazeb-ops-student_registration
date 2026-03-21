<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // የሎጊን ፎርሙን ለማሳየት
    public function showLogin()
    {
        return view('auth.login');
    }

    // ተማሪው ሲሞክር ለማረጋገጥ
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // በዳታቤዝ ውስጥ መኖሩን ማረጋገጥ
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('students.index')->with('success', 'Welcome back!');
        }

        // ካልተመሳሰለ ስህተት መመለስ
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // መውጫ (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

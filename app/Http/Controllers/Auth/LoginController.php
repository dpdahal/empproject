<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember ?? false;

        if (auth()->attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Invalid email or password.');
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}

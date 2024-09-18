<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect()->back()->with('success', 'Registration successful');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }


    }
}

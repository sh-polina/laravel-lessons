<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.form');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('articles.index');
        }

        return back()->withErrors([
            'email' => 'wrong email',
            'password' => 'wrong password'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
}

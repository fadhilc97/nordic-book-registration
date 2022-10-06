<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'error' => 'Invalid login.',
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function create_user(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password2' => 'required'
        ]);

        if ($request->password !== $request->password2) {
            return back()->withErrors([
                'error' => 'The password confirmation is not valid',
            ]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login')->with(['success' => 'Your account created!']);
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}

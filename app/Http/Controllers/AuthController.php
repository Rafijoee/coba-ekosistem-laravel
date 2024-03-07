<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect('posts');
        } else {
            return redirect('login')->with('error_message', "Wrong Email and Password !");
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
    public function form_register(Request $request)
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}

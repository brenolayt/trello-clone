<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function showLogin()
    {
        return view("/login");
    }

    public function userLogin(Request $request)
    {
        $inputs = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if(auth()->attempt([
            'email' => $inputs['email'],
            'password' => $inputs['password'],
        ])){
            $request->session()->regenerate();
            return redirect()->route("home");
        }

        return back()->withErrors([
            'login' => "Invalid credentials, please try again",
        ]);
    }

    public function logOut()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view("/register");
    }

    public function userRegister(Request $request)
    {
        $inputs = $request->validate([
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
        ]);

        $inputs['password'] = Hash::make($inputs['password']);

        $user = User::create([
            'name' => $inputs['username'],
            'password' => $inputs['password'],
            'email' => $inputs['email'],
        ]);
        auth()->login($user);
        return redirect()->route('home');
    }
}

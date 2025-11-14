<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function showLogin(){
        return view("/login");
    }

    public function userLogin(Request $request){
        return;
    }

    public function logOut(){
        auth()->logout();
        return redirect()->route('home');
    }

    public function showRegister(){
        return view("/register");
    }

    public function userRegister(Request $request){
        $inputs = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:20'],
        ]);

        $inputs['password'] = Hash::make($inputs['password']);

        $user = User::create($inputs);
        auth()->login($user);
        return redirect()->route('home');
    }
}

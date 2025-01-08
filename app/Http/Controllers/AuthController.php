<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register
    public function register(){
        return inertia('Auth/Register');
    }

    // store
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return to_route("home");
    }

    // login
    public function login(){
        return inertia("Auth/Login");
    }

    // loginStroe
    public function loginStore(Request $request){
        $fields = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();

        if(!auth()->attempt($fields)){
            return back()->withErrors([
                'email'=>'your credentials are something wrong!',
                'password'=>'your credentials are something wrong!',
            ]);
        }

        auth()->login($user);

        return to_route('home');
    }

    // logout
    public function logout(Request $request){
        Auth::logout();
        return to_route('login');
    }
}

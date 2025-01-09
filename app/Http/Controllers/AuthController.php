<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //register
    public function register()
    {
        return inertia('Auth/Register');
    }

    // store
    public function store(Request $request)
    {

        $fields = $request->validate([
            'avator' => 'nullable|file|image|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if ($request->hasFile('avator')) {

            $path = $request->file('avator')->store('avator', 'public');

            $fields['avator'] = $path;

        }

        $user = User::create($fields);

        Auth::login($user);

        return to_route("home")->with('message','You have registration success!');
    }

    // login
    public function login()
    {
        return inertia("Auth/Login");
    }

    // loginStroe
    public function loginStore(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!auth()->attempt($fields)) {
            return back()->withErrors([
                'email' => 'your credentials are something wrong!',
                'password' => 'your credentials are something wrong!',
            ]);
        }

        auth()->login($user);

        return to_route('home')->with('message','you have login success!');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        return to_route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.Login');
    }

    public function doregister(Request $request){
        $validate = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'othername' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'dob' => ['required'],
            'phone' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->othername = $request->othername;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration Successful, Please Login To Continue');
    }

    public function dologin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('user/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}

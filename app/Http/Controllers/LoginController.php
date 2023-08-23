<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;

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
            'gender' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'dob' => ['required'],
            'phone' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $code = Str::random(6);
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
        $user->verification_code = $code;
        $user->save();


        $name = $request->firstname . " ". $request->lastname ." ". $request->middlename;

        Mail::to($request->email)->send(new VerificationMail($name, $code, $request->email));

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

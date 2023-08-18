<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogicController extends Controller
{

    public function manage(){
        $users = User::paginate(15);
        return view('table.users', ['users' => $users]);
    }

    public function show($user){
        $users = User::find(decrypt($user));
        return view('table.show', ['users' => $users]);
    }

    public function edit($user){
        $users = User::find(decrypt($user));
        return view('table.edit', ['users' => $users]);
    }

    public function update(Request $request, $user){
        $validate = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'othername' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],
            'phone' => ['required'],
        ]);

        $users = User::find(decrypt($user));
        $users->firstname = $request->firstname;
        $users->lastname = $request->lastname;
        $users->othername = $request->othername;
        $users->gender = $request->gender;
        $users->dob = $request->dob;
        $users->phone = $request->phone;
        $users->update();

        return redirect()->route('manage.users')->with('success', 'User Updated Successfully');
    }
}

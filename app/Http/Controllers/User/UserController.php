<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    /**
     * Log the user out of the application.
     */

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(){
        return view('user.profile');
    }

    public function updateprofilepic(Request $request){
        $picture = $request->validate([
            'file' => ['required', 'mimes:png,jpg']
        ]);

        $user = User::find(Auth::user()->id);
        if ($request->has('file')) {

            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('user/images/');
            $image->move($imagePath, $imagename);
        }
        $user->profile_pic = $imagename;
        $user->update();

        return redirect()->back()->with('success', 'Profile Picture Change Successful');
    }
}

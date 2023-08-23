<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;

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

            // $image = $request->file('file');
            // $imagename = time() . '.' . $image->getClientOriginalExtension();
            // $imagePath = public_path('user/images/');
            // $image->move($imagePath, $imagename);

        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user/images/');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
		$constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);
        $destinationPath = public_path('/user/images');
        $image->move($destinationPath, $input['file']);
        }
        $user->profile_pic = $input['file'];
        $user->update();

        return redirect()->back()->with('success', 'Profile Picture Change Successful');
    }

    public function chat(){
        return view('user.chat.chat');
    }

    public function verifyemail(){
        return view('auth.verify');
    }

    public function resendmail(){
        $code = Str::random(6);

        $user = User::find(Auth::user()->id);
        $user->verification_code = $code;
        $user->update();

        $name = Auth::user()->firstname . " ". Auth::user()->lastname ." ". Auth::user()->middlename;

        Mail::to(Auth::user()->email)->send(new VerificationMail($name, $code, Auth::user()->email));

        return redirect()->back()->with('success', 'Email Sent');
    }

    public function confirmemail(Request $request){
        $user = User::find(Auth::user()->id);

        if ($request->code == $user->verification_code) {
            $user->email_verified_at = Carbon::now();
            $user->update();
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->withErrors('code', 'Invalid Verification Code Provided');
        }
    }
}

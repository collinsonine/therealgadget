<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function comment(){
        return view('comment');
    }

    public function postcomment(Request $request){

        $validate = $request->validate([
            'comment' => 'required|max:255'
        ]);

        $comments = session()->get('comments', []);
        array_unshift($comments, [
            'name' => 'John Deo',
            'time' => Carbon::now(),
            'body' => $request->comment
        ]);

        session()->put('comments', $comments);

        return redirect()->back()->with('success', 'Comment Posted Successfully');
    }

    public function deletecomment($id){
        $comments = session()->get('comments', []);
        array_splice($comments, decrypt($id), 1);
        session()->put('comments', $comments);
        return redirect()->back()->with('success', 'Comment Deleted Successfully');
    }
}

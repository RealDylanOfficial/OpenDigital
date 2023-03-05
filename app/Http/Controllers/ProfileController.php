<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile');
    }
    
    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'username' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',
            'profile_description'=>'string'
        ]);
        $user = Auth::user();
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->profile_description = $request['profile_description'];
        $user->save();
        return back()->with('message','Profile Updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    function index()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'username'         =>   'required|unique:users',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'username'  =>  $data['username'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
            // 'password_hash' => $data['password_hash']
        ]);

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }
    function validate_login(Request $request)
    {
        $request->validate([
            'username' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('username', 'password');
        
        if(Auth::attempt($credentials))
        {
            return redirect('home');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function home()
    {
        if(Auth::check())
        {
            return view('home');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}

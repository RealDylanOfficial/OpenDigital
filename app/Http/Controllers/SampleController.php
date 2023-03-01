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
            'username'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password_hash'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'username'  =>  $data['username'],
            'email' =>  $data['email'],
            // 'password_hash' => Hash::make($data['password_hash']) removed for testing
            'password_hash' => $data['password_hash']
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
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
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

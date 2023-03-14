<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    public static function checkUser($page, $redirect = 'login'){
        if(Auth::check())
        {
            return redirect($page);
        }

        return redirect($redirect)->with('error', 'you are not allowed to access');
    }
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
            'username' => array('required', 'min:4', 'unique:users,username', 'string', 'regex:/\w*$/', 'max:255'),
            'email'        =>   'required|email:filter|unique:users,email|max:255',
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
            return redirect('home')->with('success', 'Login successful');
        }

        return redirect('login')->with('error', 'Login details are not valid');
    }

    function home()
    {
        return SampleController::checkUser('posts');
    }
    

    

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}

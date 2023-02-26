<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class MainController extends Controller
{
    function index()
    {
     return view('login');
    }

    function checklogin(Request $request)
    {
     $this->validate($request, [
      'username'   => 'required|username',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'username'  => $request->get('username'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('test/successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('test');
    }
}
?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 


class ProfileController extends Controller
{

    public function index()
    {
        return view('profile');
    }
    
    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'username' =>'required|min:4|unique:users,username|string|max:255',
            'email'=>'required|unique:users,email|email:filter|max:255',
            'profile_description'=>'string',
            'file'=> 'max:10000'
        ]);
        $user = Auth::user();
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->profile_description = $request['profile_description'];
        
        if($request->hasFile('file')){
            if ($request['file']->isValid()) {
                $file = $request['file'];
                $destination = 'images/profile_pictures'.'/';
                $ext= $file->getClientOriginalExtension();
                $mainFilename = $user->username;

                //check if user has existing pfp
                if (File::exists($destination, $mainFilename.".".$user->pfp_file_extension)) {
                    File::delete($destination, $mainFilename.".".$user->pfp_file_extension);
                }
                $file->move($destination, $mainFilename.".".$ext);
            }
        }



        $user->pfp_file_extension = $ext;
   
        $user->save();
        return back()->with('message','Profile Updated');
    }

    
}

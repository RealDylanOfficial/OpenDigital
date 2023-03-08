<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            'username' =>'nullable|min:4|unique:users,username|string|max:255',
            'email'=>'nullable|unique:users,email|email:filter|max:255',
            'profile_description'=>'nullable|string|max:10000',
            'file'=> 'max:10000'
        ]);
        $user = Auth::user();

        if($request->filled('username')){

            // if (File::exists('images/profile_pictures'.'/'.$user->username.'.'.$user->pfp_file_extension)) {
            //     File::move('images/profile_pictures'.'/'.$user->username.'.'.$user->pfp_file_extension, 'images/profile_pictures'.'/'.$request->input('username').'.'.$user->pfp_file_extension);
            // }
            $user->username = $request->input('username');
        }
        if($request->filled('email')){
            $user->email = $request->input('email');
        }
        if($request->filled('profile_description')){
            $user->profile_description = $request->input('profile_description');
        }

        if($request->hasFile('file')){
            if ($request['file']->isValid()) {
                $file = $request['file'];
                $destination = 'images/profile_pictures'.'/';
                $ext= $file->getClientOriginalExtension();
                $mainFilename = $user->id;
                $user->pfp_file_extension = $ext;
                // check if user has existing pfp
                if (File::exists($destination, $mainFilename.".".$user->pfp_file_extension)) {
                    File::delete($destination, $mainFilename.".".$user->pfp_file_extension);
                }
                $file->move($destination, $mainFilename.".".$ext);
            }
        }
        $user->updated_at = Carbon::now();



        
   
        $user->save();
        return back()->with('message','Profile Updated');
    }

    
}

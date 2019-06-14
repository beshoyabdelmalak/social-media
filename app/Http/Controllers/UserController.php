<?php

namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File as File;

class UserController extends Controller{

    public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|unique:users,username|max:255|min:4',
            'signup_email' => 'required|unique:users,email|email',
            'signup_password' => 'required|confirmed'
        ]);

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $email = $request['signup_email'];
        $password = bcrypt($request['signup_password']);

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
            return redirect()->route('dashboard');
        else
            return redirect()->back()->with('msg', 'Incorrect Email or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("home");
    }

    public function getAccount(){
        $user = Auth::user();
        $posts = $user->posts;
        return view('profile', compact("user", "posts"));
    }

    public function update(Request $request){
        if ($request->hasFile('file')){
            $user = Auth::user();
            if ($user->image != 'default.png'){
                File::delete(public_path('/uploads/avatars/').$user->image);
            }
            $image = $request->file('file');
            $filename= $image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save(public_path('/uploads/avatars/').$filename);

            $user->image = $filename;
            $user->save();

        }

        return redirect()->route('profile', compact('user', $user));
    }

}

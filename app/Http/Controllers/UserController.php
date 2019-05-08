<?php

namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    public function dashboard(){
        return view('dashboard');
    }

    public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'signup_email' => 'required|unique:users,email|email',
            'signup_password' => 'required|confirmed'
        ]);

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $email = $request['signup_email'];
        $password = bcrypt($request['signup_password']);

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
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

}

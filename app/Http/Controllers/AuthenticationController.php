<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Use Auth;
use Session;

class AuthenticationController extends Controller
{
    
    public function loginUser(Request $login)
    {
        validator::make($login->all(),
        [
            "email" => "required|email|exists:users,email",
            "password" => "required"
        ],
        [
            "email.required" => "Email must be filled",
            "email.email" => "Email is invalid",
            "email.exists" => "Email not found",

            "password.required" => "Password must be filled"
        ])->validate();
        
        $email = $login->input('email');
        $password = $login->input('password');

        if(Auth::attempt(
            [
                "email" => $email,
                "password" => $password,
            ]
        ))
        {
            Session::flash('status', 'Login Success');
            Session::flash('type', 'success');
            return redirect ('/');
        } else {
            Session::flash('status', 'Wrong Email or Password');
            Session::flash('type', 'error');
            return redirect('/login');
        }
    }
    
    public function logout()
    {   
        Auth::logout();
        return redirect('/login');
    }
}

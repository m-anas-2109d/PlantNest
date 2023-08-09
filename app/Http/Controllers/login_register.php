<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_register extends Controller
{
    public function login()
    {
        return view('Login_Register.login');
    }

    public function register()
    {
        return view('Login_Register.register');
    }
}

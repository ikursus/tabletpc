<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function paparBorangLogin()
    {
        //return 'Ini adalah halaman login';
        // resources/views/auth/template_login.php
        // return view('auth/template_login');
        return view('auth.template_login');
    }
}

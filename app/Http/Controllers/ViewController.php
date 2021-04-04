<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    function login()
    {
        return view('login');
    }
    function signup()
    {
        return view('signup');
    }
    function dashboard()
    {
        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register_form()
    {
        return view('auth.register');
    }

    public function login_form()
    {
        return view('auth.login');
    }
}
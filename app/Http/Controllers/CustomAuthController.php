<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
   public function register(){

    return view('auth.register');
   }
}

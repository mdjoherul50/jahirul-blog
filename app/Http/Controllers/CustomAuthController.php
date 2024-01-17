<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function home(){
        return view('home.index');
    }
   public function register(){

    return view('auth.register');
   }

   public function authStore(Request $request) {
      $request->validate([
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required|min:8|confirmed',
         'password_confirmation' => 'required'
     ], [
         'name.required' => 'Please enter your name.',
         'email.required' => 'Please enter your email address.',
         'email.email' => 'Please enter a valid email address.',
         'password.required' => 'Please enter a password.',
         'password.min' => 'Password must be at least 8 characters long.',
         'password.confirmed' => 'Password confirmation does not match.',
         'password_confirmation.required' => 'Please confirm your password.'
     ]);
     $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
  ]);

  return redirect()->route('auth.authentication');


   }

   public function login(){
    return view('auth.login');


     }
}

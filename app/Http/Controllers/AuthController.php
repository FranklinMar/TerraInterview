<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function signIn() {
    // User::create(['name' => 'Denys', 'email' => 'denisbereznuuk@gmail.com', 'password' => '1234']);
    /*if (Auth::check()) {
      return redirect()->intended();
    }*/
    return view('signin');
  }

  public function signUp() {
    /*if (Auth::check()) {
      return redirect()->intended();
    }*/
    return view('signup');
  }

  public function authenticate(Request $request) {
    $validation = $request->validate([
      'login' => 'required',
      'password' => 'required'
    ]);
    $login = $validation['login'];
    $password = $validation['password'];
    /*if (Auth::attempt(['name' => $login, 'password' => $password])) {
      $request->session()->regenerate();

      return redirect()->intended();
    } 
    if (Auth::attempt(['email' => $login, 'password' => $password])) {
      $request->session()->regenerate();

      return redirect()->intended();
    }
    return back()->
    withErrors(['login' => 'Cannot find user with such Name or Email']);*/
    $credentials = ['name' => $login, 'password' => $password];
    if (!Auth::attempt($credentials)) {
      $credentials = ['email' => $login, 'password' => $password];
      if (!Auth::attempt($credentials)) {
        return back()->withErrors('Authentification failed');
      }
    }
    return redirect()->intended();
  }

  public function register(Request $request) {
    $validation = $request->validate([
      'name' => ['required', 'unique:users,name'],
      'email' => ['required', 'unique:users,email', 'email:rfc,dns'],
      'password' => ['required', 'min:8'],
      'password confirmation' => ['required', 'same:password']
    ]);
    $name = $validation['name'];
    $email = $validation['email'];
    $password = $request->input('password');
    $user = User::create(['name' => $name, 'email'=> $email, 'password' => $password]);
    auth()->login($user);
    return redirect()->intended();
  }

  public function logout(){
    session()->flush();
    Auth::logout();
    return redirect('/login');
  }
}

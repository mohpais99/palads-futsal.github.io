<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use \App\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
                $email = $request->email;
                $password = $request->password;
                if(Auth::attempt(['email'=> $email, 'password' => $password, 'role' => 'admin'])) {
                    return redirect('/admin')->with('success', 'Login Success !!');
                }
                return redirect('/home')->with('success', 'Login Success !!');
        }
        return redirect('/login')->with('error', 'Email or Password is not valid !!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $user = new User;
        $user->role = 'user';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->member = '0';
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Register Succesfully !!');
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect('/')->with('success', 'Good bye!');
    }
}

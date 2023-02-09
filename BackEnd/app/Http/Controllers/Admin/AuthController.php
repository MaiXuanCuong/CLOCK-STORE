<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.auth.login');
        }
    }

    public function postLogin(AuthRequest $request)
    {
        $data = $request->only('email','password');
        // dd(Hash::make(123456789));
        if( Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

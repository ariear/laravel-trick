<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register () {
        return view('auth.register');
    }

    public function store (Request $request) {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/');
    }
}

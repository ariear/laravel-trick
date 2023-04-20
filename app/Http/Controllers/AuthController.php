<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\ReCaptcha;

class AuthController extends Controller
{
    public function register () {
        return view('auth.register');
    }

    public function store (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        User::create($request->except(['g-recaptcha-response', '_token']));

        return redirect('/');
    }
}

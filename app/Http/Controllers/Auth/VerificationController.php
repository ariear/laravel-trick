<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice(Request $request) {
        return $request->user()->hasVerifiedEmail() ? redirect('/dashboard') : view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/dashboard');
    }

    public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->withSuccess('A fresh verification link has been sent to your email address.');
    }
}

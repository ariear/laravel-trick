<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index() {
        return view('auth.otp');
    }

    public function store(Request $request) {
        $codes = $request->code1 . $request->code2 . $request->code3 . $request->code4 . $request->code5 . $request->code6;
        dd($codes);
    }
}

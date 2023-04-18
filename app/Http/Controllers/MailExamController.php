<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailExamController extends Controller
{
    public function index () {
        $mailData = [
            'title' => 'Mail from Arie Akbarull Ridho',
        ];
        Mail::to('demianadyputra@gmail.com')->send(new DemoMail($mailData));

        dd('Email sukses terkirim');
    }
}

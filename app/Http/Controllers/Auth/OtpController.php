<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Otp;

class OtpController extends Controller
{
    public function index($user_id) {
        return view('auth.otp', [
            'user_id' => $user_id
        ]);
    }

    public function store(Request $request) {
        $codes = $request->code1 . $request->code2 . $request->code3 . $request->code4 . $request->code5 . $request->code6;

        $user = User::find($request->id);

        $otp = new Otp;
        $validate_token = $otp->validate($user->id, $codes);

        if ($validate_token->status) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back();
    }

    public function resend($user_id) {
        $user = User::find($user_id);

        $otp = new Otp;
        $otp_token = $otp->generate($user->id, 6, 15);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $user->wa_number,
                'message' => 'Haloo ini testing ya, ini adalah kode otpmu jangan bilang siapa siapa ya ' . $otp_token->token,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: taruh_token_fonntemu_disini' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        return redirect('/otp/verify/'.$user->id);
    }
}

<?php

namespace App\Http\Controllers\Auth_User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserAuthNotificationManual;
use App\Services\GenerateUserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VerifyEmailPromptController extends Controller
{
    //
    public function verifyForm()
    {
        return view('front_auth.verify_email_prompt');
    }

    public function verifySendEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users']
        ]);

        $token = GenerateUserToken::generateUserToken();
        $otp_code = GenerateUserToken::generateUserOtp();
        $user = User::where('email', $request->email)->first();
        $user->token = $token;
        $user->otp_code = $otp_code;
        $user->save();


        Notification::send($user, new UserAuthNotificationManual($user));
        session(['auth_email' => $user->email,
            'token' => $user->token,
            'token_time' => $user->updated_at]);
     

        $request->session()->flash('success', 'کد فعال سازی به ایمیل ارسال شد.');
        return redirect()->route('auth.validate.user.form');
    }


}

<?php

namespace App\Http\Controllers\Auth_User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Notification;
// use App\Services\ConvertPerToEn;
// use App\Notifications\UserAuthNotificationManual;
// use App\Services\GenerateToken;


class LoginUserController extends Controller
{
    //
    public function loginForm()
    {
        return view('front_auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {

            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $request->filled('remember'))) {
                $request->session()->regenerate();
                session()->flash('success', __('messages.your_login_was_successful'));
                return redirect()->route('home');

            } else
                session()->flash('error', __('messages.your_login_information_is_not_valid'));
            return redirect()->back();
        } catch (\Exception $ex) {
            session()->flash('success', __('messages.An_error_occurred'));
            return redirect()->route('home');
        }
    }

    public function logOut(Request $request)
    {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        $user->token = null;
        $user->otp_code = null;
        $user->remember_token = null;
        $user->activate = 0;
        // $user->password = null;
        // $user->auth_type = 0;
        // $user->mobile_verified_at = null;
        // $user->email_verified_at = null;
        $user->save();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

    //    public function login(LoginRequest $request)
    //    {
    //
    //        $auth_id = $request->auth_id;
    //        try {
    //
    //            if (filter_var($auth_id, FILTER_VALIDATE_EMAIL)) {
    //
    //                $type = 1;
    //                $user = User::where('email', $auth_id)->first();
    //                if (!$user) {
    //                    session()->flash('error', 'کاربری با ایمیل وارد شده وجود ندارد');
    //                    return redirect()->back();
    //                }
    //
    //                $token_guid = GenerateToken::generateUserTokenGuid();
    //                $token = GenerateToken::generateUserToken();
    //                $user->auth_type = $type;
    //                $user->token_guid = $token_guid;
    //                $user->token = $token;
    //                $user->save();
    //
    //                Notification::send($user, new UserAuthNotificationManual($user));
    //
    //                session([
    //                    'auth_email' => $user->email,
    //                    'token_guid' => $user->token_guid,
    //                    'token_time' => $user->updated_at
    //                ]);
    //
    //                session()->flash('success', 'کد تایید به ایمیل ارسال شد.');
    //                return redirect()->route('auth.validate.user.form');
    //            } elseif (preg_match('/^(\+98|0098|98|0)?9\d{9}$/i', $auth_id)) {
    //
    //                return __('messages.dear_user_this_part_is_being_prepared_thank_you');
    //                //$mobile = ConvertPerToEn::convert($request->mobile);
    //                //                $type = 2;
    //                //                $user = User::where('mobile', $auth_id)->first();
    //                //                if (!$user) {
    //                //                    session()->flash('error', 'کاربری با شماره موبایل وارد شده وجود ندارد');
    //                //                    return redirect()->back();
    //                //                }
    //                //
    //                //                $token_guid = GenerateToken::generateUserTokenGuid();
    //                //                $token = GenerateToken::generateUserToken();
    //                //                $user->token = $token;
    //                //                $user->token_guid = $token_guid;
    //                //                $user->auth_type = $type;
    //                //                $user->save();
    //                //
    //                //                $english_pattern = "/^(\+98|0098|98|0)?9\d{9}$/i";
    //                //                // make correct mobile format for send sms active code
    //                //                if (preg_match($english_pattern, $auth_id)) {
    //                //
    //                //                    $mobile = ltrim($auth_id, '0');
    //                //                    $mobile = substr($auth_id, 0, 2) === '98' ? substr($auth_id, 2) : $auth_id;
    //                //                    $mobile = str_replace('+98', '', $auth_id);
    //                //                }
    //                //                session(['auth_mobile' => $user->email ,
    //                //                    'token_guid' => $user->token_guid,
    //                //                    'token_time'=>$user->updated_at]);
    //                //
    //                //                session()->flash('success', 'کد فعال سازی به شماره موبایل ارسال شد.');
    //                //                return redirect()->route('auth.validate.user.form');
    //            }
    //
    //            session()->flash('error', 'شماره موبایل یا ایمیل خود را وارد کنید.');
    //            return redirect()->route('auth.login.form');
    //        } catch (\Exception $ex) {
    //            return view('errors_custom.login_error')
    //                ->with(['error' => $ex->getMessage()]);
    //        }
    //    }


}

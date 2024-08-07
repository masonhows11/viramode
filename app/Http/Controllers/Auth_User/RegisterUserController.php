<?php

namespace App\Http\Controllers\Auth_User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Notifications\UserAuthNotificationManual;
use App\Services\GenerateUserToken;
use Illuminate\Support\Facades\Notification;
// use App\Notifications\UserAuthSmsNotificationManual;
// use App\Services\ConvertPerToEn;

class RegisterUserController extends Controller
{
    //

    public function registerForm()
    {
        return view('front_auth.register');
    }

    public function register(RegisterRequest $request)
    {

        try {
            $auth_id = $request->email;
            $type = 1;
            $user = User::where('email', $auth_id)->first();
            if ($user) {
                session()->flash('error', 'ایمیل وارد شده تکراری است');
                return redirect()->back();
            }
            $token = GenerateUserToken::generateUserToken();
            $otp_code = GenerateUserToken::generateUserOtp();
            $newUser = User::create([
                'email' => $auth_id,
                'password' => $request->password,
                'auth_type' => $type,
                'token' => $token,
                'otp_code' => $otp_code,
            ]);

            Notification::send($newUser, new UserAuthNotificationManual($newUser));
            session(['auth_email' => $newUser->email,
                'token' => $newUser->token,
                'token_time' => $newUser->updated_at]);
            $request->session()->flash('success', 'کد فعال سازی به ایمیل ارسال شد.');
            return redirect()->route('auth.validate.user.form');
        }catch (\Exception $ex){
            return view('errors_custom.register_error')->with(['error' => $ex->getMessage()]);
        }

        //// code commented ////
        //        try {
        //            $auth_id = $request->email;
        //            if (filter_var($auth_id, FILTER_VALIDATE_EMAIL)) {
        //                $type = 1;
        //                $user = User::where('email', $auth_id)->first();
        //                if ($user) {
        //                    session()->flash('error', 'ایمیل وارد شده تکراری است');
        //                    return redirect()->back();
        //                }
        //                $token = GenerateToken::generateUserToken();
        //                $otp_code = GenerateToken::generateUserOtp();
        //                $newUser = User::create([
        //                    'email' => $auth_id,
        //                    'password' => $request->password,
        //                    'auth_type' => $type,
        //                    'token' => $token,
        //                    'otp_code' => $otp_code,
        //                ]);
        //                Notification::send($newUser, new UserAuthNotificationManual($newUser));
        //                session(['auth_email' => $newUser->email,
        //                    'token' => $newUser->token,
        //                    'token_time' => $newUser->updated_at]);
        //                $request->session()->flash('success', 'کد فعال سازی به ایمیل ارسال شد.');
        //                return redirect()->route('auth.validate.user.form');
        //
        //            } elseif (preg_match('/^(\+98|0098|98|0)?9\d{9}$/i', $auth_id)) {
        //                return __('messages.dear_user_this_part_is_being_prepared_thank_you');
        //                session(['user_mobile' => $user->mobile]);
        //                $request->session()->flash('success', 'کد فعال سازی به شماره موبایل ارسال شد.');
        //                return redirect()->route('auth.validate.user.form');
        //                $token = GenerateToken::generateUserToken();
        //                $mobile = ConvertPerToEn::convert($request->mobile);
        //                $user = User::create([
        //                    'name' => $request->name,
        //                    'mobile' => $mobile,
        //                    'token' => $token,
        //                ]);
        //                $user->notify(new UserAuthSmsNotificationManual($user));
        //                return view('front.auth_user.validate_mobile');
        //            }
        //            $request->session()->flash('error', 'شماره موبایل یا ایمیل خود را وارد کنید.');
        //            return redirect()->route('auth.register.form');
        //
        //        } catch (\Exception $ex) {
        //            return view('errors_custom.register_error')
        //                ->with(['error' => $ex->getMessage()]);
        //        }
    }
}


<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Rules\NationalCode;
use App\Services\GenerateAdminToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use App\Notifications\UserAuthNotification;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified_user');
    }

    public function Profile()
    {

        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('id', 'asc')->paginate(4);
        $products = auth()->user()->products()->select('id','title_persian','thumbnail_image','slug')->take(2)->get();
       // dd($products);
        return view('front_end.profile.profile', ['orders' => $orders,'user' => $user, 'products' => $products]);
    }

    public function accountInformation()
    {
        $user = Auth::user();
        return view('front_end.profile.account_information', ['user' => $user]);
    }


    public function updateProfile(Request $request)
    {


        Validator::make($request->all(),[

            'name' =>
             [Rule::requiredIf(filled($request->name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user)],
            'first_name' =>
             [Rule::requiredIf(filled($request->first_name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user)],
            'last_name' =>
             [Rule::requiredIf(filled($request->last_name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user)],
            'national_code' =>
             ['required', 'min:1', 'max:10', Rule::unique('users')->ignore($request->user), new NationalCode()],


            ]);

        try {
            User::where('id', $request->user)->update([
                'name' => $request->name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'national_code' => $request->national_code
            ]);
            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error')->with(['error' => $ex->getMessage()]);
        }


    }

    public function updateMobileForm()
    {

        $user = Auth::user();
        return view('front_end.profile.update.mobile_update', ['user' => $user]);
    }

    public function updateMobile(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'min:1', 'max:13', Rule::unique('users')->ignore($request->user)],
        ]);
        if (!preg_match('/^(\+98|0098|98|0)?9\d{9}$/i', $request->mobile)) {
            session()->flash('warning', __('messages.the_mobile_number_entered_is_invalid'));
            return back();
        }

        try {
            $mobile = $request->mobile;
            $mobile = ltrim($mobile, '0');
            $mobile = substr($mobile, 0, 2) === '98' ? substr($mobile, 2) : $mobile;
            $mobile = str_ireplace('+98', '', $mobile);
            User::where('id', $request->user)->update([
                'mobile' => $mobile,
            ]);
            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->back();
        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error')->with(['error' => $ex->getMessage()]);
        }

    }

    public function updateEmailForm()
    {

        $user = Auth::user();
        return view('front_end.profile.update.email_update', ['user' => $user]);
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($request->user)],
        ]);

        try {

            $type = 1;
            $user = User::where('id', $request->user)->first();
            $token_guid = GenerateAdminToken::generateUserTokenGuid();
            $token = GenerateAdminToken::generateUserToken();
            $user->auth_type = $type;
            $user->email = $request->email;
            $user->token_guid = $token_guid;
            $user->token = $token;
            $user->save();


            Notification::send($user, new UserAuthNotification($user));

            session(['auth_email' => $user->email, 'token_guid' => $user->token_guid, 'token_time' => $user->updated_at]);

            session()->flash('success', 'کد تایید به ایمیل ارسال شد.');
            return redirect()->route('auth.validate.mobile.form');

        } catch (\Exception $ex) {

            return view('errors_custom.model_store_error')
                ->with(['error' => $ex->getMessage()]);
        }

    }






}

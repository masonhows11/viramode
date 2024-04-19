<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Str;

class GenerateUserToken
{

    //// user token ////
    public static function generateUserOtp()
    {
        $otp = mt_rand(111111, 999999);
        if (self::userOtp($otp)) {

            return mt_rand(111111, 999999);
        }
        return $otp;
    }
    public static function userOtp($token)
    {
        return User::where('otp_code', $token)->exists();
    }
    //// user token-guid ////
    public static function generateUserToken()
    {
        $token = str::random(60);
        if (self::userToken($token)) {

            return str::random(60);
        }
        return $token;
    }
    public static function userToken($token)
    {
        return User::where('token', $token)->exists();
    }
}

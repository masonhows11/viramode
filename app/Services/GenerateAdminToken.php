<?php

namespace App\Services;

use App\Models\Admin;

class GenerateAdminToken
{

    //// admin token
    public static function generateAdminToken()
    {
        $activation_token = mt_rand(111111, 999999);

        if (self::adminToken($activation_token)) {

            return mt_rand(111111, 999999);
        }
        return $activation_token;
    }
    public static function adminToken($code)
    {
        return Admin::where('code', $code)->exists();
    }

}

<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileCommentController extends Controller
{
    public function comments(){
        try {

            return view('front_end.profile.comments');
        } catch (\Exception $ex) {
            return view('errors_custom.404_error');
        }

    }
}

<?php

namespace App\Http\Controllers\Front\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function aboutUs(){
        return view('front_end.about_us.about_us');
    }
}

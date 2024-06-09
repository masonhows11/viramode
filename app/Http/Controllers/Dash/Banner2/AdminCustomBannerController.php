<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomBanner;

class AdminCustomBannerController extends Controller
{
    //

    public function create(){

        return view('admin_end.admin_custom_banner.create');
    }



}

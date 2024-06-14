<?php

namespace App\Http\Controllers\Front\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('front_end.contact_us.contact_us');
    }


    public function store(Request $request)
    {

        session()->flash('error',__('messages.this_part_is_being_prepared'));
        return redirect()->back();

    }
}

@extends('front_end.layouts.master_front')
@section('page_title')
    {{ __('messages.contact_us') }}
@endsection
@section('main_content')
    <div class="container">

        <div class="row d-flex flex-column contact-us-form">

            <div class="col-lg-12">
                <div class="">
                    <h4> تماس با ما </h4>
                </div>
            </div>

            <div class="col-lg-12 p-4 mb-2 border border-2 rounded">

                <form action="{{ route('contact_us.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3 mt-3">
                                <input type="text" class="form-control form-control-lg" placeholder="عنوان پیام">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 mt-3">
                                <input type="text" class="form-control form-control-lg" placeholder="نام و نام خانوادگی ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 mt-3">
                                <input type="email" class="form-control form-control-lg" placeholder="ایمیل">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 mt-3">
                                <input type="tel" dir="rtl"  class="form-control form-control-lg" placeholder="شماره تماس">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 mt-3">
                                <textarea class="form-control" rows="5" placeholder="متن پیام شما"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary float-end" value="ثبت و ارسال">
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="row d-flex flex-column contact-us-address my-4">

            <div class="col-lg-12">
                <div class="title">
                    <h4>آدرس ما</h4>
                </div>
            </div>

            <div class="col-lg-12 d-flex justify-content-between border border-2 rounded p-4">

                <div class="">
                    <p class="font-14 mr-2"><i class="fa fa-location text-muted ml-2"></i><span class="font-13">دفتر مرکزی : استان کرمان -  شهرستان کرمان - خیابان بهشتی</span></p>
                    <p class="font-14 mr-2"><i class="fa fa-phone text-muted ml-2"></i>0423 289 0917</p>
                    <p class="font-14 mr-2"><i class="fa fa-envelope text-muted ml-2"></i>mason.hows11@gmail.com</p>
                </div>

                <div class="">
                    <img src="{{ asset('default_image/no-image-icon-23494.png') }}"  width="100" height="100" class="">
                </div>


            </div>
        </div>

        <div class="row border border-2 rounded p-4">
            <div class="col-12 my-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.50553736921!2d51.37741631474645!3d35.68917533714458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQxJzIxLjAiTiA1McKwMjInNDYuNiJF!5e0!3m2!1sen!2s!4v1596469430690!5m2!1sen!2s"
                    frameborder="0" class="border border-1 rounded" width="100%" height="300px"></iframe>
            </div>
        </div>



    </div>
@endsection
{{-- @stack('front_custom_scripts')

@endpush --}}

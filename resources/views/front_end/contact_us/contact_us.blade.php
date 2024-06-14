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

            <div class="col-lg-12  border border-2 rounded p-4">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="font-14 mr-2"><i class="fa fa-location  ml-2"  style="font-size:1.2rem;color:#ec3a0a;"></i><span class="font-13">آدرس : استان کرمان -  شهرستان کرمان - خیابان بهشتی</span></p>
                        <p class="font-14 mr-2"><i class="fa fa-phone  ml-2"  style="font-size:1.2rem;color:#524a48;"></i>0423 289 0917</p>
                        <p class="font-14 mr-2"><i class="fa fa-envelope  ml-2"  style="font-size:1.2rem;color:#ec3a0a;"></i>mason.hows11@gmail.com</p>
                    </div>
    
                    <div class="col-sm-6 d-flex justify-content-end align-items-center">
                        <img src="{{ asset('default_image/no-image-icon-23494.png') }}"  width="100" height="100" class="">
                    </div>
    
                </div>

            </div>
        </div>

        <div class="row d-flex flex-column contact-us-address my-4">

            <div class="col-lg-12">
                <div class="title">
                    <h4>شبکه های اجتماعی</h4>
                </div>
            </div>

            <div class="col-lg-12  border border-2 rounded p-4">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="font-14 mr-2"><a href="#" class="text-dark"><span ><i class="fab fa-instagram  ml-2" style="font-size:1.3rem;color:#ec3a0a;"></i></span> viramode_mode.ir</a></p>
                        <p class="font-14 mr-2"><a href="#" class="text-dark"><span ><i class="fab fa-telegram  ml-2" style="font-size:1.3rem;color:#6f9deb;"></i></span>viramode.ir</a></p>
                        <p class="font-14 mr-2"><a href="#" class="text-dark">
                            <span> 
                               <svg height="24" width="24" viewBox="5.312 -.192 501.099 512.323"  xmlns="http://www.w3.org/2000/svg">
                                <path d="m127.317 510.763a141.312 141.312 0 0 1 -49.749-17.707c-34.56-19.819-60.352-55.317-68.629-94.421-3.221-15.296-3.627-34.624-3.2-153.749.405-128.193.106-121.579 6.208-142.699 3.029-10.517 11.456-28.587 17.557-37.696 22.507-33.494 55.616-54.998 96.64-62.784 8.192-1.557 20.053-1.707 129.195-1.707 133.355 0 128.96-.192 150.741 6.699a145.216 145.216 0 0 1 92.032 89.259c7.04 19.989 7.381 23.189 7.872 75.84l.427 47.573-8.341 5.717c-11.904 8.128-27.52 22.613-49.408 45.867-25.216 26.795-50.688 51.627-63.616 62.016-27.925 22.421-53.504 35.221-79.488 39.765-13.525 2.347-35.883 1.429-49.109-2.027-11.797-3.072-11.029-3.584-15.488 9.899a135.573 135.573 0 0 0 -6.784 32.981l-.661 8.683-3.115-.64c-25.92-5.141-51.605-27.413-61.525-53.333a76.437 76.437 0 0 1 -5.547-26.005l-.341-7.253-6.592-6.059c-13.739-12.587-22.677-27.989-25.493-43.968-4.523-25.451 7.253-54.229 32.811-80.128 26.965-27.371 66.709-48.853 105.664-57.173 14.037-2.987 38.784-3.776 51.264-1.6 24.277 4.224 44.096 16.491 56.427 34.965 3.883 5.781 4.16 6.613 3.776 11.84a17.323 17.323 0 0 1 -3.904 10.517c-9.92 13.888-39.424 28.757-71.168 35.84-56 12.48-91.605-3.029-86.037-37.525.555-3.477.853-6.485.661-6.677-.683-.683-6.251 2.219-12.267 6.4-10.219 7.125-19.264 20.992-22.4 34.283-.768 3.328-1.067 8.661-.725 13.867.427 7.061 1.131 9.685 4.096 15.701 1.963 3.968 5.867 9.6 8.704 12.565l5.12 5.355-2.048 2.603a103.36 103.36 0 0 0 -14.443 25.963 77.547 77.547 0 0 0 -2.24 38.72c2.197 9.835 8.981 23.36 15.765 31.317 5.163 6.08 17.003 16.299 18.901 16.299.512 0 .939-1.024.939-2.261.021-4.907 3.925-20.757 6.955-28.309 9.024-22.571 28.821-41.813 60.16-58.453 5.227-2.773 20.309-10.027 33.536-16.149 29.013-13.44 44.864-21.653 53.568-27.84 25.088-17.771 40.597-44.053 45.653-77.333 1.835-12.16 1.835-34.859 0-47.083-7.851-52.011-46.827-87.381-102.784-93.227-62.4-6.549-141.824 41.664-190.763 115.776-23.808 36.053-39.893 76.053-46.656 116.117-2.624 15.531-3.605 44.373-1.984 58.667 4.117 36.352 17.536 65.664 40.597 88.661a139.328 139.328 0 0 0 39.893 28.011c50.517 24.107 106.453 24.64 155.627 1.515 21.248-10.005 42.112-25.515 64.491-48 21.76-21.867 36.48-40.107 76.629-95.104 22.187-30.357 39.765-50.517 48.469-55.573l3.2-1.835-.405 65.941c-.384 63.851-.469 66.283-2.624 75.968-12.8 57.131-54.187 98.901-110.827 111.829l-9.984 2.283-123.2.213c-100.992.171-124.8-.043-132.053-1.195z" fill="#e37600"/></svg>
                            </span>
                            <span>جوراب ویرا</span>
                        </a></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row border border-2 rounded p-4">
            <div class="col-12 my-2">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.50553736921!2d51.37741631474645!3d35.68917533714458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQxJzIxLjAiTiA1McKwMjInNDYuNiJF!5e0!3m2!1sen!2s!4v1596469430690!5m2!1sen!2s"
                    frameborder="0" class="border border-1 rounded" width="100%" height="300px"></iframe>
            </div>
        </div>



    </div>
@endsection


@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.comments') }}
@endsection
@section('left_profile_content')

<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div
                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>نقد و نظرات</h2>
            </div>
            <div class="dt-sl">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card-horizontal-product border-bottom rounded-0">
                            <div class="card-horizontal-product-thumb">
                                <a href="#">
                                    <img src="{{  asset('/front_assets/img/products/017.jpg') }}" alt="">
                                </a>
                                <small class="font-weight-bold">امتیاز من به محصول</small>
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <div class="card-horizontal-product-content">
                                <div class="label-status-comment">تایید شده</div>
                                <div class="card-horizontal-comment-title">
                                    <a href="#">
                                        <h3>عالیه</h3>
                                    </a>
                                </div>
                                <div class="card-horizontal-comment">
                                    <p>من اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                        عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                        اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                        عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                        اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                        عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                        اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                        عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                        اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                        عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.</p>
                                </div>
                                <div class="card-horizontal-product-buttons">
                                    <div class="float-right">
                                        <span class="count-like">
                                            <i class="mdi mdi-thumb-up-outline"></i>11
                                        </span>
                                        <span class="count-like">
                                            <i class="mdi mdi-thumb-down-outline"></i>2
                                        </span>
                                    </div>
                                    <button class="btn btn-light">حذف</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-horizontal-product border-bottom rounded-0">
                            <div class="card-horizontal-product-thumb">
                                <a href="#">
                                    <img src="{{  asset('/front_assets/img/products/019.jpg') }}" alt="">
                                </a>
                                <small class="font-weight-bold">امتیاز من به محصول</small>
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                    <i class="mdi mdi-star"></i>
                                    <i class="mdi mdi-star"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <div class="card-horizontal-product-content">
                                <div class="label-status-comment">تایید شده</div>
                                <div class="card-horizontal-comment-title">
                                    <a href="#">
                                        <h3>خوب نیست</h3>
                                    </a>
                                </div>
                                <div class="card-horizontal-comment">
                                    <p>جنسش خوب نیست..چسبم هست..</p>
                                </div>
                                <div class="card-horizontal-product-buttons">
                                    <div class="float-right">
                                        <span class="count-like">
                                            <i class="mdi mdi-thumb-up-outline"></i>31
                                        </span>
                                        <span class="count-like">
                                            <i class="mdi mdi-thumb-down-outline"></i>0
                                        </span>
                                    </div>
                                    <button class="btn btn-light">حذف</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        {{-- <div class="profile-card"><!-- start comment list -->
            <p class="font-13">نظرات من</p>
            <div class="row">

                <div class="col-12 profile-comment"><!-- start comment box -->
                    <div class="card d-flex flex-row mb-3 pe-1">
                        <a href="product.html"><img src="assets/images/mobile1.jpg"  class="fav-list-pic"></a>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="product.html" class="fav-list-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                <p class="badge bg-warning m-2 text-white p-1 px-2 me-4">در انتظار تایید</p>
                            </div>
                            <p><span> پیام شما : </span>پیشنهاد میکنم گوشی رو از نیک کالا بخرید چون قیمتش از
                                همه جا بهتره و خرید گوشی هم راحت‌تره. من از خریدم راضیم و محصول با کیفیتی از نیک کالا خریدم
                            </p>
                            <i class="fa fa-trash  me-4"></i>
                        </div>
                    </div>
                </div><!-- end comment box -->

                <div class="col-12 profile-comment"><!-- start comment box -->
                    <div class="card d-flex flex-row mb-3 pe-1">
                        <a href="product.html"><img src="assets/images/mobile2.jpg"  class="fav-list-pic"></a>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="product.html" class="fav-list-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                <p class="badge bg-success m-2 text-white p-1 px-2 me-4">تایید شده</p>
                            </div>
                            <p><span> پیام شما : </span>پیشنهاد میکنم گوشی رو از نیک کالا بخرید چون قیمتش از
                                همه جا بهتره و خرید گوشی هم راحت‌تره. من از خریدم راضیم و محصول با کیفیتی از نیک کالا خریدم
                            </p>
                            <i class="fa fa-trash me-4"></i>
                        </div>
                    </div>
                </div><!-- end comment box -->

            </div>
        </div> --}}
@endsection

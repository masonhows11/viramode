@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.order_details') }}
@endsection
@section('left_profile_content')

<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div class="profile-navbar">
                <a href="#" class="profile-navbar-btn-back">بازگشت</a>
                <h4>سفارش <span class="font-en">DKC-57456951</span><span>ثبت شده در تاریخ ۳۱ مرداد
                        ۱۳۹۸</span></h4>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="dt-sl dt-sn border">
                <div class="row table-draught px-3">

                    <div class="col-md-6 col-sm-12">
                        <span class="title">تحویل گیرنده:</span>
                        <span class="value">جلال بهرامی راد</span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="title">شماره تماس تحویل گیرنده:</span>
                        <span class="value">09xxxxxxxxx</span>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <span class="title">کد مرسوله:</span>
                        <span class="value">38776122</span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="title">نحوه ارسال سفارش:</span>
                        <span class="value">پست پیشتاز با ظرفیت اختصاصی برای دیدیکالا</span>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <span class="title">هزینه ارسال:</span>
                        <span class="value">رایگان</span>
                    </div>


                    <div class="col-md-6 col-sm-12">
                        <span class="title">مبلغ این مرسوله:</span>
                        <span class="value">۹,۹۸۹,۰۰۰ تومان</span>
                    </div>

                    <div class="col-12  pb-0">
                        <span class="title">مبلغ این مرسوله:</span>
                        <span class="value">۹,۹۸۹,۰۰۰ تومان</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div
                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آیتم های سفارش‌ها</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>تعداد</th>
                                <th>قیمت واحد</th>
                                <th>قیمت کل</th>
                                <th>تخفیف</th>
                                <th>قیمت نهایی</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="details-product-area">
                                        <img src="./assets/img/single-product/thumbnail-1.jpg"
                                            class="thumbnail-product" alt="">
                                        <h5 class="details-product">
                                            <span>گوشی موبایل سامسونگ مدل Galaxy S10 SM-G973F/DS دو
                                                سیم
                                                کارت
                                                ظرفیت 128 گیگابایت</span>
                                            <span>گارانتی 18 ماهه کاوش تیم</span>
                                            <span>فروشنده : اوند </span>
                                            <span>رنگ : سفید</span>
                                        </h5>
                                    </div>
                                </td>
                                <td>1</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>۰</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>
                                    <button class="btn btn-info d-block w-100 mb-2">خرید
                                        مجدد</button>
                                    <button class="btn text-light bg-secondary d-block w-100">ثبت
                                        نظر</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="details-product-area">
                                        <img src="./assets/img/single-product/thumbnail-1.jpg"
                                            class="thumbnail-product" alt="">
                                        <h5 class="details-product">
                                            <span>گوشی موبایل سامسونگ مدل Galaxy S10 SM-G973F/DS دو
                                                سیم
                                                کارت
                                                ظرفیت 128 گیگابایت</span>
                                            <span>گارانتی 18 ماهه کاوش تیم</span>
                                            <span>فروشنده : اوند </span>
                                            <span>رنگ : سفید</span>
                                        </h5>
                                    </div>
                                </td>
                                <td>1</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>۰</td>
                                <td>۳,۵۶۰,۰۰۰ تومان</td>
                                <td>
                                    <button class="btn btn-info d-block w-100 mb-2">خرید
                                        مجدد</button>
                                    <button class="btn text-light bg-secondary d-block w-100">ثبت
                                        نظر</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="profile-card">
        <div class="profile-card">
            <p class="font-13">جزئیات سفارش |<span class="order-code ms-1">{{ $order->order_number }}</span></p>

            <div class="row">
                <div class="col-md-6">

                    @if( $order->payment_type == 0 or $order->payment_type == 1)
                        <p class="font-13"> نام تحویل گیرنده
                            : {{ $order->user->first_name . ' ' . $order->user->last_name }}</p>
                    @elseif(  $order->payment_type == 2)
                        <p class="font-13"> نام تحویل گیرنده
                            : {{ $order->cashPayment->cash_receiver != null ? $order->cashPayment->cash_receiver :  $order->user->first_name . ' ' . $order->user->last_name  }}</p>
                    @endif


                    @if( $order->payment_type == 0 or $order->payment_type == 1)
                        <p class="font-13"> شماره تماس : {{ $order->user->mobile }}</p>
                    @elseif( $order->payment_type == 2 )
                        <p class="font-13 ">شماره تماس
                            : {{  $order->address->mobile != null ? $order->address->mobile : $order->user->mobile   }}</p>
                    @endif

                    @if( $order->address() != null)
                        <p class="font-13">آدرس : {{ $order->address->province->name }}
                            - {{ $order->address->city->name }} - {{ $order->address->address_description }}</p>
                    @else
                        <p class="font-13">آدرس : بدون آدرس</p>
                    @endif

                </div>
                <div class="col-md-6">
                    <p class="font-13"> نحوه ارسال : {{ $order->delivery->title }}</p>
                    <p class="font-13"> وضعیت : <span class="text-success">{{ $order->delivery_status_value }}</span>
                    </p>
                    <p class="font-13"> مبلغ کل مرسوله
                        : {{ priceFormat($order->order_final_amount) }} {{ __('messages.toman') }}</p>
                </div>
            </div>

            <div class="row mt-4">

                @if( count($order_items) > 0)
                    @foreach( $order_items as $item)
                        <div class="col-lg-3 col-6 mb-3">
                            <a href="#">
                                <div class="card custom-card">
                                    <img src="{{ asset('storage/' . $item->product->thumbnail_image) }}" alt="product-image - {{ $item->product->thumbnail_image }}" class="slider-pic">
                                    <div class="card-body">
                                        <a href="#" class="product-title">{{ $item->product->title_persian }}</a>
                                    </div>
                                    <div class="card-body">
                                        <p class="font-12"> تعداد : {{ $item->number }}</p>
                                        <p  class="font-12"> قیمت : {{ priceFormat($item->final_product_price) }} {{ __('messages.toman') }}</p>
                                        <p  class="font-12"> گارانتی : {{ $item->warranty != null ? $item->warranty->guarantee_name : 'بدون گارانتی' }}</p>
                                        <p  class="font-12"> رنگ : {{ $item->color != null ? $item->color->color_name : 'بدون رنگ' }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-3 col-6 mb-3">
                        <p class="text-center"> {{ __('messages.product_not_found') }}</p>
                    </div>
                @endif

            </div>
        </div>
    </div> --}}
@endsection


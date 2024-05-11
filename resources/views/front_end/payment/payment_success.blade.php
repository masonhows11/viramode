@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.payment_status') }}
@endsection
@section('checkout-step')
    <header class="header-shopping  dt-sl">
        <div class="container">
            <div class="row">
                @php
                    $currentRoute = 'payment.checkout';
                @endphp
                <div class="col-12 text-center">
                    <ul class="checkout-steps">
                        <li>
                            <a href="javascript:void(0)" class="active">
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="active">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="active">
                                <span>اتمام خرید و ارسال</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('main_content')
    <main class="main-content dt-sl mt-4 mb-3 shopping-page">
        <div class="container main-container">

            <div class="row">
                <div class="cart-page-content col-12 px-0">
                    <div class="checkout-alert dt-sn dt-sn--box mb-4">
                        <div class="circle-box-icon successful">
                            <i class="mdi mdi-check-bold"></i>
                        </div>
                        <div class="checkout-alert-title">
                            <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success">{{ $order->order_number }}</span>
                                با موفقیت در سیستم ثبت شد.
                            </h4>
                        </div>
                       
                    </div>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mt-4 pt-4 pb-3 pr-3 pl-3 mb-5 px-res-1">
                        <div class="checkout-details-title">
                            <h4>
                                کد سفارش:
                                <span>
                                    {{ $order->order_number }}
                                </span>
                            </h4>
                            <div class="row mt-3">
                                <div class="col-12 px-res-0">
                                    <div class="checkout-table">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    نام تحویل گیرنده:
                                                    <span>
                                                        {{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    شماره تماس :
                                                    <span>
                                                        {{ $address->mobile }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    تعداد مرسوله :
                                                    <span>
                                                        ۱
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    مبلغ کل:
                                                    <span>
                                                        {{ priceFormat($order->order_final_amount) }} تومان
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    روش پرداخت:
                                                    <span>
                                                        پرداخت اینترنتی
                                                        <span class="green">
                                                            (موفق)
                                                        </span></span>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    وضعیت سفارش:
                                                    <span>
                                                        پرداخت شد
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>آدرس :
                                                 {{  $address->province->name . ' , ' . $address->city->name . ' , ' . $address->address_description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection

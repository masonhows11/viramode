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
                        <div class="circle-box-icon failed">
                            <i class="mdi mdi-close"></i>
                        </div>
                        <div class="checkout-alert-title">
                            <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success">{{ $order->order_number }}</span>
                                ثبت شد اما پرداخت ناموفق بود.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p>
                                <span class="checkout-alert-content-failed">برای جلوگیری از لغو سیستمی سفارش، تا ۱
                                    ساعت آینده پرداخت را انجام دهید.</span>
                                <br>
                                <span class="checkout-alert-content-small px-res-1">
                                    چنانچه طی این فرایند مبلغی از حساب شما کسر شده است، طی ۷۲ ساعت آینده به حساب شما
                                    باز خواهد گشت.
                                </span>
                            </p>
                        </div>
                    </div>
             
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mt-4 pt-4 pb-3 pr-3 pl-3 mb-5">
                        <div class="checkout-details-title">
                            <h4 class="checkout-details-title px-res-1">
                                کد سفارش:
                                <span>
                                    {{ $order->order_number }}
                                </span>
                            </h4>
                            <div class="row mt-3">
                                <div class="col-12">
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
                                                        <span class="red">
                                                            (ناموفق)
                                                        </span></span>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    وضعیت سفارش:
                                                    <span>
                                                        {{ $order->order_status == 2 ? __('messages.payment_order_failed') : '' }} 
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
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl px-res-1">
                        <h2>جزئیات پرداخت</h2>
                    </div>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mb-4 pt-2 pb-3 pl-3 pr-3">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="checkout-orders-table">
                                        <tr>
                                            <td class="numrow">
                                                <p>
                                                    ردیف
                                                </p>
                                            </td>
                                            <td class="gateway">
                                                <p>
                                                    درگاه
                                                </p>
                                            </td>
                                            <td class="id">
                                                <p>
                                                    شماره پیگیری
                                                </p>
                                            </td>
                                            <td class="date">
                                                <p>
                                                    تاریخ
                                                </p>
                                            </td>
                                            <td class="price">
                                                <p>
                                                    مبلغ
                                                </p>
                                            </td>
                                            <td class="status">
                                                <p>
                                                    وضعیت
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="numrow">
                                                <p>۱</p>
                                            </td>
                                            <td class="gateway">
                                                <p>{{ __("messages.{$order->gateway}") }}</p>
                                            </td>
                                            <td class="id">
                                                <p> {{ $order->order_number }}</p>
                                            </td>
                                            <td class=" date">
                                                <p>{{ jdate($order->created_at)}}</p>
                                            </td>
                                            <td class="price">
                                                <p>{{ priceFormat($order->order_final_amount) }} تومان</p>
                                            </td>
                                            <td class="status">
                                                <p>{{ $order->order_status == 2 ? __('messages.payment_order_failed') : '' }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection

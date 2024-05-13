@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.shipping_info') }}
@endsection
@section('checkout-step')
    <header class="header-shopping  dt-sl">
        <div class="container">
            <div class="row">
                @php
                $currentRoute = 'check.address';
                @endphp

                <div class="col-12 text-center">
                    <ul class="checkout-steps">
                        <li>
                            @if ($currentRoute == request()->route()->getName())
                            <a href="javascript:void(0)" class="active">
                                <span>اطلاعات ارسال</span>
                            </a>
                            @endif
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
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

                <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب آدرس تحویل سفارش</h2>
                    </div>
                    <section class="page-content dt-sl">

                        <div class="address-section">
                                @include('front_end.address.partials.address_info',['addresses' => $addresses])

                                @error('address_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">

                            @include('front_end.address.partials.delivery_type',['deliveries' => $deliveries])

                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>مرسوله</h2>
                            </div>

                            <div class="checkout-pack">
                                <section class="products-compact">
                                    <!-- Start Product-Slider -->
                                    @include('front_end.address.partials.cart_items',['cartItems' => $cartItems])
                                    <!-- End Product-Slider -->
                                </section>
                                <hr>
                            </div>

                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>صدور فاکتور</h2>
                            </div>

                            <div class="checkout-invoice">
                                <div class="checkout-invoice-headline">
                                    <div class="custom-control custom-checkbox pl-0 pr-3">
                                        <input type="checkbox" name="invoice" class="custom-control-input">
                                        <label class="custom-control-label">درخواست ارسال فاکتور خرید</label>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="mt-5">
                             @include('front_end.address.partials.navigate_link')
                        </div>

                    </section>
                </div>


                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">

                        <div class="dt-sn dt-sn--box border mb-2">

                            <ul class="checkout-summary-summary">
                                <li>
                                    <span>{{ __('messages.final_amount')  . ' ' . $cartItemsCount . ' ' . __('messages.good') }}</span>
                                    <span>{{ priceFormat($totalProductPrice) . ' ' . __('messages.toman') }}</span>
                                </li>

                                <li>
                                    <span>هزینه ارسال</span>
                                    <span>وابسته به نوع ارسال</span>
                                </li>
                            </ul>

                            <div class="checkout-summary-devider">
                                <div></div>
                            </div>

                            <form action="{{ route('choose.address.delivery') }}" method="post" id="my-form">
                                @csrf
                            </form>

                            <div class="checkout-summary-content">

                                <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable')}}</div>
                                <div class="checkout-summary-price-value">
                                    <span class="checkout-summary-price-value-amount">{{ priceFormat($totalProductPrice) }}</span>
                                    {{ __('messages.toman') }}
                                </div>

                                    <button type="submit" onclick="document.getElementById('my-form').submit();" class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                        <i class="mdi mdi-arrow-left"></i>
                                        {{ __('messages.confirm_continue_order')}}
                                     </button>

                                <div>
                                    <span>
                                        {{ __('messages.shopping_cart_message') }}
                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                        data-placement="bottom"
                                        title="<div class='help-container is-right'>
                                            <div class='help-arrow'>
                                            </div>
                                            <p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، ویرا مد هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                        <span class="mdi mdi-information-outline"></span>
                                    </span>
                                </div>
                            </div>
                        </div>


                </div>

            </div>
        </div>

    </main>


@endsection
@push('payment_custom_scripts')
    <script>
    </script>
@endpush

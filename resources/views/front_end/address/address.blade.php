@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.shipping_info') }}
@endsection
@section('checkout-step')
    {{-- <div class="col-12">
        <ul class="checkout-steps">
            <li class="is-completed">
                @php
                    $currentRoute = 'check.address';
                @endphp
                @if ($currentRoute == request()->route()->getName())
                    <a href="#" class="checkout-steps-active  active-link-shopping">اطلاعات ارسال</a>
                @endif
            </li>
            <li class="is-completed">
                <a href="#" class="checkout-steps-item  active-link">پرداخت</a>
            </li>
            <li class="is-active">
                <a href="#" class="checkout-steps-item  active-link">اتمام خرید و ارسال</a>
            </li>
        </ul>
    </div --}}

    <header class="header-shopping  dt-sl">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-2">
                    <div class="header-shopping-logo dt-sl">
                        <a href="#">
                            {{-- <img src="{{ asset('/front_assets/img/logo.png') }}" alt=""> --}}
                        </a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <ul class="checkout-steps">
                        <li>
                            <a href="#" class="active">
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
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
                        <h2>آدرس تحویل سفارش</h2>
                    </div>
                    <section class="page-content dt-sl">
                        <div class="address-section">

                            <div class="checkout-contact dt-sn dt-sn--box border px-0 pt-0 pb-0">

                                <input type="input" form="my-form" name="address_id" value="{{ $address->id }}"
                                    class="d-none">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            {{ __('messages.receiver') }}:
                                            <span
                                                class="full-name">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</span>
                                            <a href="{{ route('profile.address.edit', $address->id) }}"
                                                class="checkout-contact-btn-edit">اصلاح این آدرس</a>
                                        </li>
                                        <li class="checkout-contact-item">
                                            <div class="checkout-contact-item checkout-contact-item-mobile">
                                                {{ __('messages.phone_number') }}:
                                                <span class="mobile-phone">{{ $address->mobile }}</span>
                                            </div>
                                            <div class="checkout-contact-item-message">
                                                {{ __('messages.post_code') }}:
                                                <span class="post-code">{{ $address->postal_code }}</span>
                                            </div>
                                            <br>
                                            استان
                                            <span class="state">{{ $address->province->name }}</span>
                                            ، ‌شهر
                                            <span class="city">{{ $address->city->name }}</span>
                                            ،
                                            <span class="address-part">{{ $address->address_description }}</span>
                                        </li>
                                    </ul>
                                    <div class="checkout-contact-badge">
                                        <i class="mdi mdi-check-bold"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>انتخاب نحوه ارسال</h2>
                            </div>
                            <div class="checkout-shipment border-bottom pb-3 mb-4">

                                @foreach ($deliveries as $delivery)
                                    <div class="custom-control custom-radio pl-0 pr-3">
                                        <input type="radio" form="my-form" name="delivery_id" class="custom-control-input"
                                            name="delivery" id="radio-{{ $delivery->id }}" value="{{ $delivery->id }}">
                                        <label for="radio-{{ $delivery->id }}" class="custom-control-label">
                                            {{ $delivery->title }}
                                        </label>
                                    </div>
                                @endforeach

                                @error('delivery_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>مرسوله</h2>
                            </div>

                            <div class="checkout-pack">
                                <section class="products-compact">
                                    <!-- Start Product-Slider -->
                                    <div class="col-12">
                                        <div class="products-compact-slider carousel-md owl-carousel owl-theme">

                                            @foreach ($cartItems as $product)
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb"
                                                            href="{{ route('product', $product->product->slug) }}">

                                                            @if (
                                                                $product->product->thumbnail_image &&
                                                                    \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image))
                                                                <img src="{{ asset('storage/' . $product->product->thumbnail_image) }}"
                                                                    alt="Product Thumbnail">
                                                            @else
                                                                <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                                                    alt="Product Thumbnail">
                                                            @endif

                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="{{ route('product', $product->product->slug) }}">
                                                                    {{ $product->product->title_persian }}
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
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
                                        <input type="checkbox" name="invoice" class="custom-control-input" checked>
                                        <label class="custom-control-label">درخواست ارسال فاکتور خرید</label>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="mt-5">
                            <a href="{{ route('cart.check') }}" class="float-right border-bottom-dt">
                                <i class="mdi mdi-chevron-double-right">
                                </i>بازگشت به سبد خرید</a>
                            <a href="" class="float-left border-bottom-dt">
                                تایید و ادامه ثبت سفارش<i class="mdi mdi-chevron-double-left">
                                </i>
                            </a>
                        </div>

                    </section>
                </div>


                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">





                    <div class="dt-sn dt-sn--box border mb-2">

                        <ul class="checkout-summary-summary">
                            <li>
                                <span>مبلغ کل ({{ $cartItemsCount }}
                                    کالا)</span><span>{{ priceFormat($totalProductPrice) }}
                                    {{ __('messages.toman') }}</span>
                            </li>

                            <li>
                                <span>هزینه ارسال</span><span>وابسته به آدرس</span>
                            </li>
                        </ul>

                        <div class="checkout-summary-devider">
                            <div></div>
                        </div>

                        <form action="{{ route('choose.address.delivery') }}" method="post" id="my-form">
                            @csrf
                        </form>

                        <div class="checkout-summary-content">
                            <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable') }}</div>
                            <div class="checkout-summary-price-value">
                                <span
                                    class="checkout-summary-price-value-amount">{{ priceFormat($totalProductPrice) }}</span>
                                {{ __('messages.toman') }}
                            </div>
                            <a href="#" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    {{ __('messages.confirm_continue_order') }}
                                </button>
                            </a>
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
    <script></script>
@endpush

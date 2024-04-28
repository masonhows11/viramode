@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.payment') }}
@endsection
@section('checkout-step')
    {{-- <div class="col-12">
        <ul class="checkout-steps">
            @php
                $currentRoute = 'payment';
            @endphp
            <li class="is-completed-extra">
                <a href="#" class="checkout-steps-active  active-link-shopping">اطلاعات ارسال</a>
            </li>
            <li class="is-completed">
                @if( $currentRoute == request()->route()->getName() )
                    <a href="#" class="checkout-steps-active active-link-shopping">پرداخت</a>
                @else
                    <a href="#" class="checkout-steps-item  active-link">پرداخت</a>
                @endif
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

<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <section class="page-content dt-sl">

                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب شیوه پرداخت</h2>
                    </div>

                    <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3 mb-4">
                        <div class="checkout-pack">

                            <div class="row">
                                <div class="checkout-time-table checkout-time-table-time">
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz"  id="1" value="1" checked>
                                            <label for="1" class="custom-control-label">
                                                <div class="content-box">
                                                    <div  class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اینترنتی
                                                    </div>
                                                    <ul class="checkout-time-table-subtitle-bar">
                                                        <li>
                                                            آنلاین با تمامی کارت‌های بانکی
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz"   id="2" value="2">
                                            <label for="2" class="custom-control-label">
                                                <div class="content-box">
                                                    <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اعتباری
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>خلاصه سفارش</h2>
                    </div>
                    <div class="dt-sn dt-sn--box pt-3 pb-3">
                        <div class="checkout-order-summary">
                            <div class="accordion checkout-order-summary-item" id="accordionExample">
                                <div class="card border-bottom pt-sl-res">

                                    {{-- delivery information--}}
                                    <div class="card-header checkout-order-summary-header" id="headingOne">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-muted">
                                                    مرسوله ۱ از ۱ <span class="fs-sm">(۲ کالا)</span>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="text-muted">
                                                    <span class="dl-none-sm">نحوه ارسال:</span>
                                                    <span class="dl-none-sm">
                                                        پست پیشتاز با ظرفیت اختصاصی برای دیجی کالا
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="text-muted">
                                                    <span>ارسال از</span>
                                                    <span class="fs-sm">
                                                        2 روز کاری
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="text-muted">
                                                    <span>هزینه ارسال</span>
                                                    <span class="fs-sm">
                                                        رایگان
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- cart items --}}
                                    <div class="box">
                                        <div class="row">

                                            @foreach ($cartItems as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="product-box-container">
                                                    <div class="product-box product-box-compact">

                                                        <a href="{{ route('product', $product->product->slug) }}" class="product-box-img">
                                                            @if ( $product->product->thumbnail_image &&
                                                                    \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image))
                                                                <img src="{{ asset('storage/' . $product->product->thumbnail_image) }}"
                                                                    alt="Product-Thumbnail">
                                                            @else
                                                                <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                                                    alt="Product Thumbnail">
                                                            @endif

                                                        </a>
                                                        <div class="product-box-title">
                                                            {{ $product->product->title_persian }}

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        {{-- start gift cart discount --}}
                        <div class="col-sm-6 col-12">
                            <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>استفاده از کارت هدیه
                                        <span class="help-sn" data-toggle="tooltip" data-html="true"
                                            data-placement="bottom"
                                            title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با استفاده از کد کارت هدیه، تمام یا بخشی از مبلغ سفارش توسط کارت هدیه پرداخت می‌شود.
                                                در صورت باقی ماندن بخشی از مبلغ کارت هدیه، امکان استفاده از باقی مانده مبلغ برای خریدهای بعدی امکان‌پذیر است.</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span>
                                    </h2>
                                </div>
                                <p>با ثبت کد کارت هدیه، مبلغ کارت هدیه از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                <div class="form-ui">
                                    <form action="">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2"
                                                        placeholder="مثلا 1234ABCD5678EFGH0123">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد هدیه</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                         {{-- end gift cart discount --}}

                         {{-- start code discount --}}
                        <div class="col-sm-6 col-12">
                            <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>استفاده از کد تخفیف
                                        <span class="help-sn" data-toggle="tooltip" data-html="true"
                                            data-placement="bottom"
                                            title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>بعد از نهایی شدن سفارش کد تخفیف را ثبت نمایید. بعد از ثبت کد تخفیف امکان بازگشت و یا تغییر سبد وجود نخواهد داشت. در صورت تغییر سفارش، کد تخفیف از بین خواهد رفت و امکان اعمال مجدد آن وجود ندارد</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span>
                                    </h2>
                                </div>
                                <p>با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                <div class="form-ui">
                                    <form action="">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2"
                                                        placeholder="مثلا 837A2CS">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                         {{-- end code discount --}}
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('check.address') }}" class="float-right border-bottom-dt">
                            <i class="mdi mdi-chevron-double-right"></i>بازگشت به شیوه ارسال</a>
                        <a href="#" class="float-left border-bottom-dt">ثبت نهایی سفارش<i class="mdi mdi-chevron-double-left"></i>
                        </a>
                    </div>

                </section>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                <div class="dt-sn dt-sn--box border mb-2">
                    <ul class="checkout-summary-summary">
                        <li>
                            <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                        </li>
                        <li>
                            <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                    data-placement="bottom"
                                    title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                    <span class="mdi mdi-information-outline"></span>
                                </span></span><span>رایگان</span>
                        </li>
                        {{-- <li class="checkout-club-container">
                            <span>دیدیکلاب<span class="help-sn" data-toggle="tooltip" data-html="true"
                                    data-placement="bottom"
                                    title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                    <span class="mdi mdi-information-outline"></span>
                                </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                        </li> --}}
                    </ul>
                    <div class="checkout-summary-devider">
                        <div></div>
                    </div>
                    <div class="checkout-summary-content">
                        <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable')}}</div>
                        <div class="checkout-summary-price-value">
                            <span class="checkout-summary-price-value-amount">۱۶,۶۹۷,۰۰۰</span>
                            تومان
                        </div>
                        <a href="#" class="mb-2 d-block">
                            <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                <i class="mdi mdi-arrow-left"></i>
                                پرداخت و ثبت نهایی سفارش
                            </button>
                        </a>
                        <div>
                            <span>
                              {{ __('messages.shopping_cart_message') }}
                            </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                data-placement="bottom"
                                title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                <span class="mdi mdi-information-outline"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    {{-- <div class="container">
        <div class="row">
            <main>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-9 customer-info">


                            <div class="cart-content">
                                <form action="{{ route('payment.submit') }}" id="payment-submit" method="post">
                                    @csrf

                                    <p class="font-14"> انتخاب شیوه پرداخت</p>

                                    <div class="row content-wrapper">
                                        <div class="col-10">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" value="1" name="paymentType">
                                                <i class="fa fa-credit-card font-20 align-middle text-muted"></i>
                                                <p class="font-12 d-inline-block ms-2"> پرداخت اینترنتی ( آنلاین با تمامی کارت‌های بانکی ) </p>
                                                <label class="form-check-label" for="radio1"></label>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-end">
                                            <img src="{{ asset('front/images/dpay.png') }}" class="dpay">
                                        </div>
                                    </div>

                                    <div class="row mt-4 content-wrapper">
                                        <div class="col-10">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" value="2" name="paymentType">
                                                <i class="fa fa-credit-card font-20 align-middle text-muted"></i>
                                                <p class="font-12 d-inline-block ms-2"> افزایش اعتبار و پرداخت از کیف پول </p>
                                                <label class="form-check-label" for="radio2"></label>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-end">
                                            <img src="{{ asset('front/images/dpay.png') }}" class="dpay">
                                        </div>
                                    </div>

                                    <div class="row mt-4 content-wrapper">
                                        <div class="col-10 content-wrapper-pay-on-spot">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="payment-on-spot" value="3" name="paymentType">
                                                <i class="fa fa-credit-card font-20 align-middle text-muted"></i>
                                                <p class="font-12 d-inline-block ms-2"> پرداخت در محل</p>
                                                <label class="form-check-label" for="payment-on-spot"></label>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-center justify-content-end">
                                            <img src="{{ asset('front/images/dpay.png') }}" class="dpay">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            @error('paymentType')
                                            <div class="text-danger mt-2 ms-3 font-13">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                </form>
                            </div>

                            <div class="cart-content">
                                <p class="font-14"> کد تخفیف {{ __('messages.site_name') }}</p>
                                <form action="{{ route('coupon-discount') }}" method="post">
                                    @csrf
                                    <div class="row px-2">
                                        <div class="col">
                                            <input type="text" name="code" id="code" class="form-control" placeholder="کد تخفیف را وارد کنید">
                                            @error('code')
                                            <div class="alert alert-danger font-12 mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="submit" value="اعمال کد" class="btn btn-info font-13">
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-5">
                                    <a href="{{ route('check.address') }}" class="text-info font-12"><i class="fa fa-arrow-right align-middle me-1"></i>بازگشت به مرحله قبل</a>
                                    <a href="#" class="text-info font-12">تایید و ادامه ثبت سفارش <i class="fa fa-arrow-left align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        @php
                            $totalProductPrice = 0;
                            $totalDiscount = 0;
                        @endphp
                        @if( count($cartItems) > 0)
                            @foreach( $cartItems as $cartItem )
                                @php
                                    $totalProductPrice += $cartItem->cartItemProductPriceWithOutNumber() * $cartItem->number;
                                    $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                @endphp
                            @endforeach
                            <div class="col-lg-3">
                                <div class="cart-content">
                                    <div class="product-seller-row">
                                        <span>{{ __('messages.seller') }}</span>
                                        <span>{{ __('messages.good_shopping_online_store') }}</span>
                                    </div>
                                    @php
                                        $cartItemsCount = null;
                                         foreach( $cartItems as $item )
                                          {
                                              $cartItemsCount += $item->number;
                                          }
                                    @endphp
                                    <div class="product-seller-row">
                                        <span>{{ __('messages.quantity') }}</span>
                                        <span> {{ $cartItemsCount }} عدد </span>
                                    </div>
                                    <div class="product-seller-row">
                                        <span>{{ __('messages.total_price') }}  </span>
                                        <span class="text-danger"> {{ priceFormat($totalProductPrice) }} {{ __('messages.toman') }} </span>
                                    </div>

                                    @if( $totalDiscount != 0)
                                        <div class="product-seller-row">
                                            <span>{{ __('messages.order_discount_amazing_amount') }}  </span>
                                            <span class="text-danger">{{  priceFormat($totalDiscount ) }} {{ __('messages.toman') }}</span>
                                        </div>
                                    @endif

                                    @if( $order->commonDiscount != null)
                                        <div class="product-seller-row">
                                            <span>{{ __('messages.common_discount_amount') }}  </span>
                                            <span class="text-danger">{{  priceFormat($order->commonDiscount->percentage ) }}  {{ __('messages.percentage') }}</span>
                                        </div>
                                    @endif
                                    @if( $order->coupon != null)
                                        <div class="product-seller-row">
                                            <span>{{ __('messages.coupon_discount_amount') }}  </span>
                                            @if(  $order->coupon->amount_type == 0)
                                                <span class="text-danger">{{  $order->coupon->amount }}  {{ __('messages.percentage') }}</span>
                                            @else
                                                <span class="text-danger">{{  priceFormat($order->coupon->amount ) }}  {{ __('messages.toman') }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="product-seller-row">
                                        <span>{{ __('messages.final_price_cart_with_discount') }}</span>
                                        <span class="text-danger"> {{ priceFormat( $order->order_final_amount - $order->delivery->amount   ) }} {{ __('messages.toman') }}</span>
                                    </div>

                                    @if( $order->delivery != null)
                                        <div class="product-seller-row">
                                            <span>{{ __('messages.delivery_amount') }}</span>
                                            <span class="text-danger">{{ priceFormat($order->delivery->amount) }} {{ __('messages.toman') }}</span>
                                        </div>
                                    @endif

                                    <div class="product-seller-row">
                                        <span>{{ __('messages.the_amount_payable') }}</span>
                                        <span class="text-danger"> {{ priceFormat( $order->order_final_amount   ) }} {{ __('messages.toman') }}</span>
                                    </div>

                                    <button type="button" onclick="document.getElementById('payment-submit').submit();" class="btn btn-danger add-cart-btn">ادامه پرداخت
                                    </button>
                                    <p class="font-12 text-muted mt-3 line-height text-center">
                                        {{ __('messages.register_the_goods_in_your_basket_are_not_reserved_complete_the_next_steps_to_place_an_order') }}
                                    </p>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </main>


        </div>
    </div> --}}
@endsection
@push('custom_scripts')
    <script>
        $(document).ready(function () {

          $('#payment-on-spot').click(function () {

              var newDiv = document.createElement('div');
              newDiv.innerHTML = `
              <div class="mb-3">
                <input type="text" name="cash_receiver" class="form-control" id="cash_receiver" form="payment-submit" placeholder="{{ __('messages.full_name_receiver') }}">
              </div> `;
                document.getElementsByClassName('content-wrapper-pay-on-spot')[0].appendChild(newDiv);

          })


        })

    </script>
@endpush

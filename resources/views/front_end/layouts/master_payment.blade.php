<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/image/icon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    @include('front_end.layouts.header_styles')

</head>
<body>
    <div class="wrapper shopping-page">

        <!-- Start header-shopping -->
        <header class="header-shopping dt-sl">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="header-shopping-logo dt-sl">
                            <a href="http://viramode.test">
                                <h5 class="h5 text-center my-2  text-danger">{{ __('messages.site_name')}}</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        @yield('checkout-step')
                        {{-- <ul class="checkout-steps">
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
                        </ul> --}}

                    </div>
                </div>
            </div>
        </header>
        <!-- End header-shopping -->

        <!-- Start main-content -->
        @yield('main_content')

        {{-- <main class="main-content dt-sl mt-4 mb-3">

           <div class="container main-container">
                <div class="row">
                    <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>انتخاب آدرس تحویل سفارش</h2>
                        </div>
                        <section class="page-content dt-sl">
                            <div class="address-section">
                                <div class="checkout-contact dt-sn dt-sn--box border px-0 pt-0 pb-0">
                                    <div class="checkout-contact-content">
                                        <ul class="checkout-contact-items">
                                            <li class="checkout-contact-item">
                                                گیرنده:
                                                <span class="full-name">جلال بهرامی راد</span>
                                                <a class="checkout-contact-btn-edit">اصلاح این آدرس</a>
                                            </li>
                                            <li class="checkout-contact-item">
                                                <div class="checkout-contact-item checkout-contact-item-mobile">
                                                    شماره تماس:
                                                    <span class="mobile-phone">09xxxxxxxxx</span>
                                                </div>
                                                <div class="checkout-contact-item-message">
                                                    کد پستی:
                                                    <span class="post-code">۹۹۹۹۹۹۹۹۹۹</span>
                                                </div>
                                                <br>
                                                استان
                                                <span class="state">خراسان شمالی</span>
                                                ، ‌شهر
                                                <span class="city">بجنورد</span>
                                                ،
                                                <span class="address-part">خراسان شمالی-بجنورد</span>
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
                                    <div class="custom-control custom-radio pl-0 pr-3">
                                        <input type="radio" class="custom-control-input" name="radio1" id="radio1"
                                            value="option1" checked>
                                        <label for="radio1" class="custom-control-label">
                                            عادی
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio  pl-0 pr-3">
                                        <input type="radio" class="custom-control-input" name="radio1" id="radio2"
                                            value="option2">
                                        <label for="radio2" class="custom-control-label">
                                            سریع‌ (مرسوله‌ها در سریع‌ترین زمان ممکن ارسال می‌شوند)
                                        </label>
                                    </div>
                                </div>
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                    <h2>مرسوله ۱ از ۱</h2>
                                </div>
                                <div class="checkout-pack">
                                    <section class="products-compact">
                                        <!-- Start Product-Slider -->
                                        <div class="col-12">
                                            <div class="products-compact-slider carousel-md owl-carousel owl-theme">
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/07.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">مانتو زنانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/017.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">کت مردانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/013.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">مانتو زنانه مدل هودی تیک
                                                                    تین</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/09.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">مانتو زنانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/010.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">مانتو زنانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/011.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">مانتو زنانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="product-card mb-3">
                                                        <a class="product-thumb" href="shop-single.html">
                                                            <img src="./assets/img/products/019.jpg"
                                                                alt="Product Thumbnail">
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="shop-single.html">تیشرت مردانه</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product-Slider -->
                                    </section>
                                    <hr>
                                </div>


                                 <!-- purchase invoice -->
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                    <h2>صدور فاکتور</h2>
                                </div>
                                <div class="checkout-invoice">
                                    <div class="checkout-invoice-headline">
                                        <div class="custom-control custom-checkbox pl-0 pr-3">
                                            <input type="checkbox" class="custom-control-input" checked>
                                            <label class="custom-control-label">درخواست ارسال فاکتور خرید</label>
                                        </div>
                                    </div>
                                </div>
                                 <!-- end purchase invoice -->

                            </form>

                             <!-- navigatio link -->
                            <div class="mt-5">
                                <a href="#" class="float-right border-bottom-dt"><i
                                        class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                                <a href="#" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
                                        class="mdi mdi-chevron-double-left"></i></a>
                            </div>
                             <!-- end navigatio link -->

                        </section>
                    </div>


                     <!-- left price box -->
                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                        <div class="dt-sn dt-sn--box border mb-2">
                            <ul class="checkout-summary-summary">
                                <li>
                                    <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                                </li>
                                <li class="checkout-summary-discount">
                                    <span>سود شما از خرید</span><span><span>(۱٪)</span>۲۰۰,۰۰۰
                                        تومان</span>
                                </li>
                                <li>
                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                            data-placement="bottom"
                                            title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span>وابسته به آدرس</span>
                                </li>
                                <li class="checkout-club-container">
                                    <span>دیدیکلاب<span class="help-sn" data-toggle="tooltip" data-html="true"
                                            data-placement="bottom"
                                            title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                </li>
                            </ul>
                            <div class="checkout-summary-devider">
                                <div></div>
                            </div>
                            <div class="checkout-summary-content">
                                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                <div class="checkout-summary-price-value">
                                    <span class="checkout-summary-price-value-amount">۱۶,۶۹۷,۰۰۰</span>
                                    تومان
                                </div>
                                <a href="#" class="mb-2 d-block">
                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                        <i class="mdi mdi-arrow-left"></i>
                                        تایید و ادامه ثبت سفارش
                                    </button>
                                </a>
                                <div>
                                    <span>
                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                        مراحل بعدی را تکمیل کنید.
                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                        data-placement="bottom"
                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                        <span class="mdi mdi-information-outline"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End left price box -->

                </div>
            </div>

        </main> --}}
        <!-- End main-content -->

        <!-- Start mini-footer -->
        <livewire:front.layout.front-footer/>
        {{-- @include('front_end.layouts.footer_payment') --}}
        <!-- End mini-footer -->

    </div>


@include('front_end.layouts.footer_scripts')
@include('front_end.layouts.alert.alert')
@include('front_end.layouts.alert.toast_alert')
@include('front_end.layouts.alert.delete_confirm',['className'=> 'delete-item'])
@stack('payment_custom_scripts')
</body>

</html>


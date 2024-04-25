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
                @if( $currentRoute == request()->route()->getName() )
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
                                <a class="checkout-contact-location" id="btn-checkout-contact-location">تغییر
                                    آدرس
                                    ارسال</a>
                                <div class="checkout-contact-badge">
                                    <i class="mdi mdi-check-bold"></i>
                                </div>
                            </div>

                            <div class="checkout-address dt-sn px-0 pt-0 pb-0" id="user-address-list-container">
                                <div class="checkout-address-content">
                                    <div class="checkout-address-headline">آدرس مورد نظر خود را جهت تحویل
                                        انتخاب فرمایید:</div>
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                            <button class="checkout-address-location" data-toggle="modal"
                                                data-target="#modal-location">
                                                <strong>ایجاد آدرس جدید</strong>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                            <div class="checkout-address-box is-selected">
                                                <h5 class="checkout-address-title">جلال بهرامی راد</h5>
                                                <p class="checkout-address-text">
                                                    <span>خراسان شمالی، بجنورد،خراسان شمالی-بجنورد-طالقانی
                                                        غربی</span>
                                                </p>
                                                <ul class="checkout-address-list">
                                                    <li>
                                                        <ul class="checkout-address-contact-info">
                                                            <li class="">کدپستی: <span>۹۹۹۹۹۹۹۹۹۹</span></li>
                                                            <li>شماره همراه: <span>09xxxxxxxxx</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <button class="checkout-address-btn-edit"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-location-edit">ویرایش</button>
                                                            </li>
                                                            <li>
                                                                <button class="checkout-address-btn-remove"
                                                                    data-toggle="modal"
                                                                    data-target="#remove-location">حذف</button>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <button class="checkout-address-btn-submit">سفارش به این آدرس
                                                    ارسال می‌شود.</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                            <div class="checkout-address-box">
                                                <h5 class="checkout-address-title">جلال بهرامی راد</h5>
                                                <p class="checkout-address-text">
                                                    <span>خراسان شمالی، بجنورد،خراسان شمالی-بجنورد</span>
                                                </p>
                                                <ul class="checkout-address-list">
                                                    <li>
                                                        <ul class="checkout-address-contact-info">
                                                            <li>کدپستی: <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                            </li>
                                                            <li>شماره همراه: <span>09xxxxxxxxx</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <button class="checkout-address-btn-edit"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-location-edit">ویرایش</button>
                                                            </li>
                                                            <li>
                                                                <button class="checkout-address-btn-remove"
                                                                    data-toggle="modal"
                                                                    data-target="#remove-location">حذف</button>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <button class="checkout-address-btn-submit">ارسال سفارش به این
                                                    آدرس</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="checkout-address-cancel" id="cancel-change-address-btn"></button>
                            </div>
                            <!-- Start Modal location new -->
                            <div class="modal fade" id="modal-location" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                <i class="now-ui-icons location_pin"></i>
                                                افزودن آدرس جدید
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-ui dt-sl">
                                                        <form class="form-account" action="">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            نام و نام خانوادگی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input class="input-ui pr-2 text-right"
                                                                            type="text"
                                                                            placeholder="نام خود را وارد نمایید">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            شماره موبایل
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input
                                                                            class="input-ui pl-2 dir-ltr text-left"
                                                                            type="text"
                                                                            placeholder="09xxxxxxxxx">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            استان
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="custom-select-ui">
                                                                            <select class="right">
                                                                                <option value="khrasan-north">
                                                                                    خراسان شمالی
                                                                                </option>
                                                                                <option value="tehran">
                                                                                    تهران
                                                                                </option>
                                                                                <option value="esfahan">
                                                                                    اصفهان
                                                                                </option>
                                                                                <option value="shiraz">
                                                                                    شیراز
                                                                                </option>
                                                                                <option value="tabriz">
                                                                                    تبریز
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            شهر
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="custom-select-ui">
                                                                            <select class="right">
                                                                                <option value="bojnourd">
                                                                                    بجنورد
                                                                                </option>
                                                                                <option value="garme">
                                                                                    گرمه
                                                                                </option>
                                                                                <option value="shirvan">
                                                                                    شیروان
                                                                                </option>
                                                                                <option value="mane">
                                                                                    مانه و سملقان
                                                                                </option>
                                                                                <option value="esfarayen">
                                                                                    اسفراین
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            آدرس پستی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <textarea
                                                                            class="input-ui pr-2 text-right"
                                                                            placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            کد پستی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input
                                                                            class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                            type="text"
                                                                            placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 pr-4 pl-4">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                        و
                                                                        ارسال به این آدرس</button>
                                                                    <button type="button"
                                                                        class="btn-link-border float-left mt-2">انصراف
                                                                        و بازگشت</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <!-- Google Map Start -->
                                                    <div class="goole-map">
                                                        <div id="map" style="height:440px"></div>
                                                    </div>
                                                    <!-- Google Map End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal location new -->

                            <!-- Start Modal location edit -->
                            {{-- <div class="modal fade" id="modal-location-edit" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                <i class="now-ui-icons location_pin"></i>
                                                ویرایش آدرس
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-ui dt-sl">
                                                        <form class="form-account" action="">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            نام و نام خانوادگی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input class="input-ui pr-2 text-right"
                                                                            type="text"
                                                                            placeholder="نام خود را وارد نمایید">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            شماره موبایل
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input
                                                                            class="input-ui pl-2 dir-ltr text-left"
                                                                            type="text"
                                                                            placeholder="09xxxxxxxxx">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            استان
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="custom-select-ui">
                                                                            <select class="right">
                                                                                <option value="khrasan-north">
                                                                                    خراسان شمالی
                                                                                </option>
                                                                                <option value="tehran">
                                                                                    تهران
                                                                                </option>
                                                                                <option value="esfahan">
                                                                                    اصفهان
                                                                                </option>
                                                                                <option value="shiraz">
                                                                                    شیراز
                                                                                </option>
                                                                                <option value="tabriz">
                                                                                    تبریز
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            شهر
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="custom-select-ui">
                                                                            <select class="right">
                                                                                <option value="bojnourd">
                                                                                    بجنورد
                                                                                </option>
                                                                                <option value="garme">
                                                                                    گرمه
                                                                                </option>
                                                                                <option value="shirvan">
                                                                                    شیروان
                                                                                </option>
                                                                                <option value="mane">
                                                                                    مانه و سملقان
                                                                                </option>
                                                                                <option value="esfarayen">
                                                                                    اسفراین
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            آدرس پستی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <textarea
                                                                            class="input-ui pr-2 text-right"
                                                                            placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <div class="form-row-title">
                                                                        <h4>
                                                                            کد پستی
                                                                        </h4>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <input
                                                                            class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                            type="text"
                                                                            placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 pr-4 pl-4">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                        و
                                                                        ارسال به این آدرس</button>
                                                                    <button type="button"
                                                                        class="btn-link-border float-left mt-2">انصراف
                                                                        و بازگشت</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <!-- Google Map Start -->
                                                    <div class="goole-map">
                                                        <div id="map-edit" style="height:440px"></div>
                                                    </div>
                                                    <!-- Google Map End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End Modal location edit -->

                            <!-- Start Modal remove-location -->
                            {{-- <div class="modal fade" id="remove-location" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                                                این آدرس حذف شود؟</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="remodal-general-alert-button remodal-general-alert-button--cancel"
                                                data-dismiss="modal">خیر</button>
                                            <button type="button"
                                                class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End Modal remove-location -->
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
                            <h2>مرسوله</h2>
                        </div>

                        <div class="checkout-pack">
                            <section class="products-compact">
                                <!-- Start Product-Slider -->
                                <div class="col-12">
                                    <div class="products-compact-slider carousel-md owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="product-card mb-3">
                                                <a class="product-thumb" href="shop-single.html">
                                                    <img src="{{  asset('/front_assets/img/products/07.jpg') }}"
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
                                                    <img src="{{  asset('/front_assets/img/products/017.jpg') }}"
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
                                                    <img src="{{ asset('/front_assets/img/products/013.jpg') }}"
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
                                                    <img src="{{  asset('/front_assets/img/products/09.jpg') }}"
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
                                                    <img src="{{  asset('/front_assets/img/products/010.jpg') }}"
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
                                                    <img src="{{  asset('/front_assets/img/products/011.jpg') }}"
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
                                                    <img src="{{  asset('/front_assets/img/products/019.jpg') }}"
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
                            <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                        </li>

                        <li>
                            <span>هزینه ارسال</span><span>وابسته به آدرس</span>
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
        </div>
    </div>

</main>

    {{-- <div class="container">

        <div class="row mt-3">

            <div class="col-lg-9 customer-info">
                <div class="row">
                    @if( $errors->any())
                        <div class="cart-content d-flex justify-content-start">
                            <div class="my-3 py-2">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    @endif
                </div>
                <!-- address select section -->
                <div class="row">
                    <div class="cart-content checkout-contact" id="address-radio-select">
                        <p class="font-14"> انتخاب آدرس تحویل سفارش</p>
                        @if ( count($addresses) > 0)
                            @foreach( $addresses as $address)
                                <div class="row  py-2 my-2 border border-2  rounded-2  address-select">
                                    <div class="col-10  address-item">
                                        <input type="radio" form="my-form" name="address_id" value="{{ $address->id }}" class="d-none" id="a-{{ $address->id }}">
                                        <label for="a-{{ $address->id }}" class="address-item">
                                            <p class="font-13"> گیرنده : {{ $address->recipient_first_name . ' ' . $address->recipient_last_name}}</p>
                                            <p class="font-13"> استان : {{ $address->province->name }} </p>
                                            <p class="font-13"> شهرستان : {{ $address->city->name }} </p>
                                            <span class="font-13"> شماره تماس :  {{ $address->mobile }}</span>
                                            <span class="mx-2">|</span>
                                            <span class="font-13">کد پستی : {{ $address->postal_code }}</span>
                                            <span class="mx-2">|</span>
                                            <span class="font-13">  پلاک : {{ $address->plate_number }} </span>
                                            <p class="font-13 mt-3">آدرس : {{ $address->address_description}}</p>
                                        </label>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end">
                                        <div>
                                            <button type="button" class="btn btn-light font-12 text-muted border" data-bs-toggle="modal" data-bs-target="#change-address-modal-{{ $address->id }}">{{ __('messages.edit_model') }}</button></div>
                                        <div>
                                            <form action="{{ route('address.delete',$address->id) }}" method="get" class="ms-2">
                                                <button type="submit" class="btn btn-sm btn-danger  delete-item">{{ __('messages.delete_model') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- start change address modal -->
                                <div class="modal fade" id="change-address-modal-{{ $address->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light">
                                                <h6 class="text-muted modal-title">{{ __('messages.edit_address') }}</h6>
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('address.update') }}" method="post"
                                                      id="edit-address-modal-{{ $address->id }}">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="address" value="{{ $address->id }}">
                                                        <div class="col my-3">
                                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_first_name') }}: </label>
                                                            <input type="text" name="recipient_first_name" id="recipient_first_name" class="form-control form-control-lg" value="{{ $address->recipient_first_name  }}">
                                                        </div>
                                                        <div class="col my-3">
                                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_last_name') }}: </label>
                                                            <input type="text" name="recipient_last_name" id="recipient_last_name" class="form-control form-control-lg" value="{{ $address->recipient_last_name  }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label ms-2 font-13 light-font">{{ __('messages.province') }}: </label>
                                                            <select class="form-select form-select-lg font-13"
                                                                    name="province_id"
                                                                    id="province-edit-address-{{ $address->id }}">
                                                                @foreach( $provinces as $province)
                                                                    <option class="font-13" {{ $address->province_id == $province->id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label ms-2 font-13 light-font">{{ __('messages.city') }}: </label>
                                                            <select class="form-select form-select-lg font-13" name="city_id" id="city-edit-address-{{ $address->id }}">
                                                                <option value="{{ $address->city_id }}" class="font-13">{{ $address->city->name }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.plate_number') }}: </label>
                                                            <input type="text" name="plate_number" id="plate_number" class="form-control form-control-lg" value=" {{ $address->plate_number }}">
                                                        </div>
                                                        <div class="col my-3">
                                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.post_code') }}: </label>
                                                            <input type="text" name="postal_code" id="postal_code" class="form-control form-control-lg" value="{{ $address->postal_code }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <label for="mobile" class="form-label ms-2 font-13 light-font">{{ __('messages.mobile') }}: </label>
                                                            <input type="text" name="mobile" id="mobile" class="form-control form-control-lg" value="{{ $address->mobile }}">
                                                        </div>
                                                    </div>
                                                    <div class="my-3">
                                                        <textarea class="form-control" name="address_description" id="address_description" rows="5">{{ $address->address_description }}</textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <input type="submit" class="send-btn" value="{{ __('messages.edit_model') }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end change address modal -->
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="cart-content d-flex justify-content-center">
                        <div class="my-3 py-2">
                            <button type="button" class="btn btn-light font-13 text-muted border" data-bs-toggle="modal"
                                    data-bs-target="#new-address-modal">{{ __('messages.add_new_address') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- start new address modal -->
                    <div class="modal fade" id="new-address-modal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h6 class="text-muted modal-title">{{ __('messages.add_new_address') }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('address.store') }}" method="post" id="create-address-modal">
                                        @csrf
                                        <div class="row">
                                            <div class="col my-3">
                                                <label
                                                    class="form-label ms-2 font-13 light-font">  {{ __('messages.recipient_first_name') }}
                                                    : </label>
                                                <input type="text" name="recipient_first_name" id="recipient_first_name"
                                                       class="form-control form-control-lg" placeholder="نام">
                                            </div>
                                            <div class="col my-3">
                                                <label
                                                    class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_last_name') }}
                                                    : </label>
                                                <input type="text" name="recipient_last_name" id="recipient_last_name"
                                                       class="form-control form-control-lg" placeholder="نام خانوادگی">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="province-select"
                                                       class="form-label ms-2 font-13 light-font">{{ __('messages.province') }}
                                                    : </label>
                                                <select class="form-select form-select-lg font-13" name="province_id"
                                                        id="province-select">
                                                    <option selected>{{ __('messages.choose') }}</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province->id }}"
                                                                class="font-13">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="city-new-address"
                                                       class="form-label ms-2 font-13 light-font">{{ __('messages.city') }}
                                                    : </label>
                                                <select class="form-select form-select-lg font-13" name="city_id"
                                                        id="city-new-address">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col my-3">
                                                <label
                                                    class="form-label ms-2 font-13 light-font">{{ __('messages.plate_number') }}
                                                    : </label>
                                                <input type="text" name="plate_number" id="plate_number"
                                                       class="form-control form-control-lg" placeholder="شماره پلاک">
                                            </div>
                                            <div class="col my-3">
                                                <label
                                                    class="form-label ms-2 font-13 light-font"> {{ __('messages.post_code') }}
                                                    : </label>
                                                <input type="text" name="postal_code" id="postal_code"
                                                       class="form-control form-control-lg" placeholder="کد پستی">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col my-3">
                                                <label for="mobile"
                                                       class="form-label ms-2 font-13 light-font">{{ __('messages.mobile') }}
                                                    : </label>
                                                <input type="text" name="mobile" id="mobile"
                                                       class="form-control form-control-lg" placeholder="موبایل">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="my-3">
                                                <textarea class="form-control" name="address_description"
                                                          id="address_description" rows="5"
                                                          placeholder=" آدرس"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <input type="submit" class="send-btn" value="ثبت آدرس">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer border-top-0"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end new address modal -->
                </div>

                <div class="row cart-content">
                    @if( count($cartItems) > 0)
                        @foreach($cartItems as $item)
                            <div class="col-lg-4 col-sm-6 mb-3">
                                <a href="{{ route('product',$item->product->slug) }}">
                                    <div class="card custom-card">
                                        <img src="{{ asset('storage/' . $item->product->thumbnail_image) }}"
                                             alt="product-image" class="slider-pic">
                                        <div class="card-body">
                                            <a href="{{ route('product',$item->product->slug) }}"
                                               class="product-title">{{ $item->product->title_persian }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- delivery select section -->
                <div class="container cart-content">
                    @if( $deliveries != null)
                        <form action="#">
                            <div class="row" id="delivery-radio-select">
                                @foreach( $deliveries as $delivery)
                                    <input type="radio" form="my-form" name="delivery_id" value="{{ $delivery->id }}" class="d-none delivery-select" id="d-{{ $delivery->id }}">
                                    <label for="d-{{ $delivery->id }}" class="col border border-2 rounded-2 mx-2 d-flex justify-content-around py-4 delivery-item   address-box">
                                        <div><img src="{{ asset('front/images/post.svg') }}" class="d-block mx-auto p-2"></div><div>
                                            <p class="font-12 mt-3">بازه تحویل سفارش : زمان تقریبی تحویل {{ $delivery->delivery_time }} {{ $delivery->delivery_time_unit }}</p>
                                            <span class="font-12 light-font text-muted">شیوه ارسال : {{ $delivery->title }} </span>
                                            <span class="text-muted mx-1">|</span>
                                            <span class="font-12 light-font text-muted">هزینه ارسال : {{ priceFormat( $delivery->amount) }} {{ __('messages.toman') }}</span>
                                        </div>
                                    </label>
                                @endforeach
                                @endif
                            </div>
                        </form>
                </div>

                <div class="row cart-content">
                    <p class="font-13">صدور فاکتور</p>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="check2" checked>
                        <label class="form-check-label font-12 text-muted" for="check2">درخواست ارسال فاکتور
                            خرید</label>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('cart.check') }}" class="text-info font-12"><i
                                class="fa fa-arrow-right align-middle me-1"></i> بازگشت به سبد خرید</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('my-form').submit();" class="text-info font-12">تایید و ادامه ثبت سفارش <i
                                class="fa fa-arrow-left align-middle ms-1"></i></a>
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
                        $totalProductPrice += $cartItem->cartItemProductPrice();
                        $totalDiscount += $cartItem->cartItemProductDiscount();
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
                             foreach( $cartItems as $item ){
                                  $cartItemsCount += $item->number;
                              }
                        @endphp

                        <div class="product-seller-row">
                            <span>{{ __('messages.quantity') }}</span>
                            <span> {{ $cartItemsCount }} عدد </span>
                        </div>
                        <div class="product-seller-row">
                            <span>{{ __('messages.total_price') }}  </span>
                            <span
                                class="text-danger"> {{ priceFormat($totalProductPrice) }} {{ __('messages.toman') }} </span>
                        </div>
                        <div class="product-seller-row">
                            <span>{{ __('messages.order_discount_amount') }}  </span>
                            <span
                                class="text-danger">{{  priceFormat( $totalDiscount ) }} {{ __('messages.toman') }}</span>
                        </div>
                        <div class="product-seller-row">
                            <span>{{ __('messages.delivery_amount') }}</span>
                            <span class="text-danger">وابسته به آدرس</span>
                        </div>
                        <div class="product-seller-row">
                            <span>{{ __('messages.final_price') }}</span>
                            <span
                                class="text-danger"> {{ priceFormat( $totalProductPrice - $totalDiscount   ) }} {{ __('messages.toman') }}</span>
                        </div>

                        <form action="{{ route('choose.address.delivery') }}" method="post" id="my-form">
                        @csrf
                        </form>

                        <button type="submit" onclick="document.getElementById('my-form').submit();" class="btn btn-danger add-cart-btn">ادامه فرایند خرید</button>
                        <p class="font-12 text-muted mt-3 line-height text-center">
                            {{ __('messages.register_the_goods_in_your_basket_are_not_reserved_complete_the_next_steps_to_place_an_order') }}
                        </p>
                    </div>
                </div>
            @endif
        </div>

    </div> --}}
@endsection
@push('payment_custom_scripts')
    <script>

        $(document).ready(function () {

            // for create address get cities from province
            $('#province-select').change(function () {
                let id = $('#province-select option:selected').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('get.cities') }}',
                    method: 'GET',
                    data: {id: id}
                }).done(function (data) {

                    if (data.status === 200) {
                        let cities = data.data;
                        $('#city-new-address').empty();
                        cities.map((city) => {
                            $('#city-new-address').append($('<option/>').val(city.id).text(city.name))
                        })
                    } else if (data.status === 404) {
                        $('#city-new-address').empty();
                        console.log(data['data']);
                    }
                }).fail(function (data) {
                    console.log(data['data']);
                });
            });

            // for edit address get cities from province
            var addresses = {!! auth()->user()->addresses !!}
            addresses.map(function (address) {
                let id = address.id;
                var target = `#province-edit-address-${id}`;
                var selected = `${target} option:selected`;
                $(target).change(function () {
                    let id = $(selected).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('get.cities') }}',
                        method: 'GET',
                        data: {id: id}
                    }).done(function (data) {
                        if (data.status === 200) {
                            let cities = data.data;
                            $(`#city-edit-address-${address.id}`).empty();
                            cities.map((city) => {
                                $(`#city-edit-address-${address.id}`).append($('<option/>').val(city.id).text(city.name))
                            })
                        } else if (data.status === 404) {
                            $(`#city-edit-address-${address.id}`).empty();
                            console.log(data['data']);
                        }
                    }).fail(function (data) {
                        console.log(data['data']);
                    });
                });
            });

            // for change background color div " delivery type " selected
           $('#address-radio-select input:radio').change(function() {
                $('.row.address-selected').removeClass('address-selected');
                $(this).closest('.address-select').addClass('address-selected');
            });

            $('#delivery-radio-select input:radio').change(function() {
                $('label.delivery-selected').removeClass('delivery-selected');
                $(this).closest('.delivery-select').next('label').addClass('delivery-selected');
            });

        })

    </script>
@endpush

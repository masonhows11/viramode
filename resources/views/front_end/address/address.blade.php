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

                                <input type="input" form="my-form" name="address_id" value="{{ $address->id }}" class="d-none">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            {{ __('messages.receiver') }}:
                                            <span class="full-name">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name  }}</span>
                                            <a href="{{ route('profile.address.edit',$address->id) }}" class="checkout-contact-btn-edit">اصلاح این آدرس</a>
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
                                            <span class="state">{{  $address->province->name }}</span>
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
                                        <input type="radio"
                                                 form="my-form"
                                                 name="delivery_id"
                                                 class="custom-control-input"
                                                 name="delivery"
                                                 id="radio-{{ $delivery->id }}" value="{{ $delivery->id }}">
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
                                    <span>مبلغ کل ({{ $cartItemsCount }} کالا)</span><span>{{ priceFormat($totalProductPrice) }} {{ __('messages.toman') }}</span>
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
                                <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable')}}</div>
                                <div class="checkout-summary-price-value">
                                    <span class="checkout-summary-price-value-amount">{{ priceFormat($totalProductPrice) }}</span>
                                    {{ __('messages.toman') }}
                                </div>
                                <a href="#" class="mb-2 d-block">
                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                        <i class="mdi mdi-arrow-left"></i>
                                        {{ __('messages.confirm_continue_order')}}
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

    {{-- <div class="container">

        <div class="row mt-3">

            <div class="col-lg-9 customer-info">
                <div class="row">
                    @if ($errors->any())
                        <div class="cart-content d-flex justify-content-start">
                            <div class="my-3 py-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
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
                        @if (count($addresses) > 0)
                            @foreach ($addresses as $address)
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
                                                                @foreach ($provinces as $province)
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
                                                    @foreach ($provinces as $province)
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
                    @if (count($cartItems) > 0)
                        @foreach ($cartItems as $item)
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
                    @if ($deliveries != null)
                        <form action="#">
                            <div class="row" id="delivery-radio-select">
                                @foreach ($deliveries as $delivery)
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

            @if (count($cartItems) > 0)

                @foreach ($cartItems as $cartItem)
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
        $(document).ready(function() {

            // for create address get cities from province
            $('#province-select').change(function() {
                let id = $('#province-select option:selected').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('get.cities') }}',
                    method: 'GET',
                    data: {
                        id: id
                    }
                }).done(function(data) {

                    if (data.status === 200) {
                        let cities = data.data;
                        $('#city-new-address').empty();
                        cities.map((city) => {
                            $('#city-new-address').append($('<option/>').val(city.id).text(
                                city.name))
                        })
                    } else if (data.status === 404) {
                        $('#city-new-address').empty();
                        console.log(data['data']);
                    }
                }).fail(function(data) {
                    console.log(data['data']);
                });
            });

            // for edit address get cities from province
            var addresses = {!! auth()->user()->addresses !!}
            addresses.map(function(address) {
                let id = address.id;
                var target = `#province-edit-address-${id}`;
                var selected = `${target} option:selected`;
                $(target).change(function() {
                    let id = $(selected).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('get.cities') }}',
                        method: 'GET',
                        data: {
                            id: id
                        }
                    }).done(function(data) {
                        if (data.status === 200) {
                            let cities = data.data;
                            $(`#city-edit-address-${address.id}`).empty();
                            cities.map((city) => {
                                $(`#city-edit-address-${address.id}`).append($(
                                    '<option/>').val(city.id).text(city
                                    .name))
                            })
                        } else if (data.status === 404) {
                            $(`#city-edit-address-${address.id}`).empty();
                            console.log(data['data']);
                        }
                    }).fail(function(data) {
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

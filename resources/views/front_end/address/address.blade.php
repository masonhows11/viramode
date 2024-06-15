@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.shipping_info') }}
@endsection
@section('checkout-step')
    @php
        $currentRoute = 'check.address';
    @endphp
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
@endsection
@section('main_content')

{{-- @inject('basket', 'App\Services\Basket\Basket' )
<p>{{  $basket->totalPrice(Auth::id()) }}</p> --}}

{{-- @inject('price','App\Services\BasketPrice\Contracts\PriceInterface')
<p>{{  dd($price->getPrice(Auth::id()) , $price->getSummary(Auth::id())) }}</p> --}}

    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">

                <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب آدرس تحویل سفارش</h2>
                    </div>
                    <section class="page-content dt-sl">



                        <div class="address-section">
                            @include('front_end.address.partials.address_info', [
                                'addresses' => $addresses,
                            ])

                            @error('address_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">

                            @include('front_end.address.partials.delivery_type', [
                                'deliveries' => $deliveries,
                            ])

                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>مرسوله</h2>
                            </div>

                            <div class="checkout-pack">
                                <section class="products-compact">
                                    <!-- Start Product-Slider -->
                                    @include('front_end.address.partials.cart_items', [
                                        'cartItems' => $cartItems,
                                    ])
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
                    @include('front_end.address.partials.price_box' ,
                    ['cartItemsCount' => $cartItemsCount ,'totalProductPrice' => $totalProductPrice])
                </div>

            </div>
        </div>
    </main>
@endsection
@push('payment_custom_scripts')
    <script></script>
@endpush

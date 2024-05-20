@extends('front_end.layouts.master_payment')
@section('page_title')
    {{ __('messages.payment') }}
@endsection
@section('checkout-step')
    @php
        $currentRoute = 'payment.checkout';
    @endphp
    <ul class="checkout-steps">
        <li>
            <a href="javascript:void(0)" class="active">
                <span>اطلاعات ارسال</span>
            </a>
        </li>
        <li class="">
            @if ($currentRoute == request()->route()->getName())
                <a href="javascript:void(0)" class="active">
                    <span>پرداخت</span>
                </a>
            @endif
        </li>
        <li>
            <a href="javascript:void(0)">
                <span>اتمام خرید و ارسال</span>
            </a>
        </li>
    </ul>
@endsection
@section('main_content')

    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">

                <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                    <section class="page-content dt-sl">

                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>انتخاب درگاه پرداخت</h2>
                        </div>

                        <form action="{{ route('payment') }}" method="post" id="payment_submit"
                            class="dt-sn dt-sn--box pt-3 pb-3 mb-4">
                            @csrf

                            <input type="hidden" name="order" value="{{ $order->id }}">

                            <div class="checkout-pack">
                                @include('front_end.payment.partials.payment_type')
                            </div>
                        </form>
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>خلاصه سفارش</h2>
                        </div>

                        <div class="dt-sn dt-sn--box pt-3 pb-3">
                            <div class="checkout-order-summary">
                                <div class="accordion checkout-order-summary-item" id="accordionExample">
                                    <div class="card border-bottom pt-sl-res">
                                        @include('front_end.payment.partials.delivery_info', [
                                            'order' => $order,
                                        ])

                                        @include('front_end.payment.partials.cart_items', [
                                            'cartItems' => $cartItems,
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            {{-- @include('front_end.payment.partials.gitf_cart_discount') --}}
                            {{-- @include('front_end.payment.partials.code_discount') --}}
                        </div>
                        <div class="mt-5">
                            @include('front_end.payment.partials.navigate_link')
                        </div>
                    </section>
                </div>

                <div class="col-xl-3 col-lg-4 col-12  w-res-sidebar sticky-sidebar">

                @include('front_end.payment.partials.price_box',
                ['cartItemsCount' => $cartItemsCount , 'totalProductPrice' => $totalProductPrice , 'order' => $order])
                </div>



            </div>
        </div>
    </main>
@endsection
@push('custom_scripts')
    <script>
        $(document).ready(function() {

            $('#payment-on-spot').click(function() {

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

<div class="product-summary" wire:ignore>



        <nav id="stack-menu">

            <ul>
                <li>
                    <a href="javascript:void(0)">
                        <i class="far fa-box-check product-delivery-warehouse"></i>
                        {{  $product->available_in_stock != 0 ? __('messages.available_in_stock') : __('messages.out_of_stock') }}
                    </a>
                </li>
            </ul>

            <div class="product-seller-row product-seller-row--price">

                {{--  <div class="product-seller-price-info">
                    <div class="product-seller-price-prev">
                        4,900,000
                    </div>
                    <div class="product-seller-price-off">
                        5٪
                    </div>
                </div>  --}}

                <div class="product-seller-price-real">
                    <div class="product-seller-price-raw">{{  priceFormat($product->origin_price) }}</div>
                    تومان
                </div>

                {{--  <div
                    class="product-additional-item product-additional-item--no-icon">
                    <span>321,600</span>&nbsp; تومان تخفیف سازمانی کسر گردیده است.
                </div>  --}}

            </div>

            <div class="product-seller-row product-seller-row--add-to-cart">

                <button {{ $product->available_in_stock == 0 ? 'disabled' : '' }}
                        type="button"
                        wire:click="addToCart({{ $product->id }})"
                        class="btn-add-to-cart btn-add-to-cart--full-width">
                       {{  $product->available_in_stock != 0 ? __('messages.add_to_cart') : __('messages.out_of_stock') }}
                </button>



                {{--  <div class="product-seller-digiclub">
                    <img src="{{ asset('front_assets/img/digiclub.png') }}" alt="">
                    <div>
                        دریافت
                        <span>۱۵۰</span>
                        امتیاز دیجی‌کلاب با خرید این کالا
                    </div>
                </div>  --}}


            </div>


        </nav>



</div>

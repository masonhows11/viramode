<div class="col-xl-9 col-lg-8 col-12 px-0">

    <div class="table-responsive checkout-content dt-sl">

        <div class="checkout-header checkout-header--express"></div>

        <div class="checkout-section-content-dd-k">

            <div class="cart-items-dd-k">

                @php
                    $totalProductPrice = 0;
                    $totalDiscount = 0;
                @endphp

                @foreach ($cartItems as $product)
                    @php
                        $totalProductPrice += $product->cartItemProductPrice();
                        $totalDiscount += $product->cartItemProductDiscount();
                    @endphp

                    <div class="cart-item py-4 px-3">

                        <div class="item-thumbnail">
                            <a href="{{ route('product', $product->product->slug) }}">
                                @if ($product->product->thumbnail_image &&   \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image))
                                    <img src="{{ asset('storage/' . $product->product->thumbnail_image) }}"  alt="Product Thumbnail">
                                @else
                                    <img src="{{ asset('default_image/no-image-icon-23494.png') }}"  alt="Product Thumbnail">
                                @endif
                            </a>
                        </div>

                        <div class="item-info flex-grow-1">
                            <div class="item-title">
                                <h2>
                                    <a href="{{ route('product', $product->product->slug) }}">
                                        {{ $product->product->title_persian }}
                                    </a>
                                </h2>
                            </div>
                            <div class="item-detail">
                                <div class="item-quantity--item-price">
                                    <div class="item-quantity">
                                        <div class="num-block">
                                            <div class="num-in">
                                                <button class="plus border-0 bg-transparent"
                                                    wire:click="increaseItem({{ $product->id }})"></button>
                                                <input type="text" min="1" class="in-num"
                                                    value="{{ $product->number }}" readonly>
                                                <button
                                                    class="minus border-0 bg-transparent @if ($product->number == 1) dis @endif"
                                                    @if ($this->disabled == true) disabled @endif
                                                    wire:click="decreaseItem({{ $product->id }})"></button>
                                            </div>
                                        </div>
                                        <button wire:click.prevent="deleteConfirmation({{ $product->id }})"
                                            class="item-remove-btn mr-3">
                                            <i class="far fa-trash-alt"></i>
                                            {{ __('messages.delete_model') }}
                                        </button>
                                    </div>

                                    <div class="item-price">
                                        {{ $product->number }}
                                        <span class="text-sm mr-1">{{ __('messages.number') }}</span>
                                    </div>
                                    <div class="item-price">
                                        {{ priceFormat($product->cartItemProductPrice()) }}
                                        <span class="text-sm mr-1">{{ __('messages.toman') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@if( count($cartItems) > 0)
<div class="col-xl-3 col-lg-4 col-12 w-res-sidebar">

    <div class="dt-sn dt-sn--box border mb-2">
        <ul class="checkout-summary-summary">

            @php
                $cartItemsCount = null;
                foreach( $cartItems as $item )
                 {
                    $cartItemsCount += $item->number;
                 }
            @endphp
            <li>
                <span>مبلغ کل ({{ $cartItemsCount }} کالا)</span><span> {{ priceFormat($totalProductPrice) . ' ' . __('messages.toman')  }}</span>
            </li>


            <li>
                <span>هزینه ارسال </span>
                <span>وابسته به نوع ارسال</span>
            </li>
        </ul>
        <div class="checkout-summary-devider">
            <div></div>
        </div>

        <div class="checkout-summary-content">
            <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable')}}</div>
            <div class="checkout-summary-price-value">
                <span class="checkout-summary-price-value-amount">{{ priceFormat($totalProductPrice) . ' ' . __('messages.toman')  }}</span>
            </div>
            <a href="{{ route('check.address') }}" class="mb-2 d-block">
                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                    <i class="mdi mdi-arrow-left"></i>
                     {{  __('messages.continue_register_order') }}
                </button>
            </a>
            <div>
                <span>
                   {{ __('messages.shopping_cart_message') }}
                </span>
            </div>
        </div>

    </div>
</div>
@endif

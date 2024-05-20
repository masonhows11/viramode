<div class="dt-sn dt-sn--box border mb-2">
    <ul class="checkout-summary-summary">
        <li>
            <span>{{ __('messages.final_amount') . ' ' . $cartItemsCount . ' ' . __('messages.good') }}</span>
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


        <div class="checkout-summary-price-title">
            {{ __('messages.the_amount_payable') }}
        </div>

        <div class="checkout-summary-price-value">
            <span class="checkout-summary-price-value-amount">
                {{ priceFormat($totalProductPrice) . ' ' . __('messages.toman') }}
            </span>
        </div>

        <button type="submit" onclick="document.getElementById('my-form').submit();"
            class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
            <i class="mdi mdi-arrow-left"></i>
            {{ __('messages.confirm_continue_order') }}
        </button>

        <div>
            <span>
                {{ __('messages.shopping_cart_message') }}
            </span>
        </div>
    </div>
</div>

<div>

    <a class="nav-link" href="{{  route('cart.check') }}">
        <span class="label-dropdown">سبد خرید</span>
        <i class="mdi mdi-cart-outline"></i>
        <span class="count">{{ $cartItemsCount ? $cartItemsCount : 0  }}</span>
    </a>



</div>

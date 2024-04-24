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
                        class="rounded rounded-lg border border-danger custom-btn-add-to"
                        style="width:100% ;min-height:55px; background-color: #ef394e ; font-size: 16px;  color: #fff ; padding: 16px 18px">
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
@push('front_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        })
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
        @if( session()->has('warning') )
        Toast.fire({
            icon: 'warning',
            title: '{{ session()->get('warning') }}'
        })
        @elseif( session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}'
        })
        @endif
    </script>
@endpush


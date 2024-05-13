<div class="container main-container">
    @if (count($cartItems))
        <div class="row mx-0">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2">
                <nav class="tab-cart-page">
                    <div class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link d-inline-flex w-auto active" id="nav-home-tab" data-toggle="tab"
                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">سبد خرید</a>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"   aria-labelledby="nav-home-tab">
                        <div class="row">
                            @include('livewire.front.cart.partials.cart_products_parice',
                                     ['cartItems' => $cartItems,'cartItemsCount'=> $cartItemsCount,'totalProductPrice' => $totalProductPrice ])
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        @include('livewire.front.cart.partials.cart_empty')
    @endif
</div>
@push('front_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: 'javascript:void(0)3085d6',
                cancelButtonColor: 'javascript:void(0)d33',
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
        window.addEventListener('show-result', ({
            detail: {
                type,
                message
            }
        }) => {
            Swal.fire({
                icon: type,
                text: message,
            });
        })
        @if (session()->has('warning'))
            Toast.fire({
                icon: 'warning',
                title: '{{ session()->get('warning') }}'
            })
        @elseif (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}'
            })
        @endif
    </script>
@endpush

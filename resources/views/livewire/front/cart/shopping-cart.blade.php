<div class="container main-container">


            @if( count($cartItems) )
            <div class="row mx-0">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2">

                    <nav class="tab-cart-page">
                        <div class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link d-inline-flex w-auto active" id="nav-home-tab"
                                data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                aria-selected="true">سبد خرید</a>
                        </div>
                    </nav>

                </div>

                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-12 px-0">

                                    <div class="table-responsive checkout-content dt-sl">
                                        <div class="checkout-header checkout-header--express">
                                            <span class="checkout-header-title">ارسال عادی</span>
                                            <span class="checkout-header-extra-info">(2 کالا)</span>
                                        </div>

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

                                                        <a  href="{{ route('product',$product->product->slug) }}">
                                                            @if( $product->product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image ) )
                                                                <img src="{{ asset('storage/'.$product->product->thumbnail_image) }}"
                                                                     alt="Product Thumbnail">
                                                            @else
                                                                <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                                                     alt="Product Thumbnail">
                                                            @endif
                                                        </a>

                                                    </div>
                                                    <div class="item-info flex-grow-1">
                                                        <div class="item-title">
                                                            <h2>
                                                                <a href="{{ route('product',$product->product->slug) }}">
                                                                {{ $product->product->title_persian}}
                                                                </a>
                                                            </h2>
                                                        </div>

                                                        <div class="item-detail">

                                                            <div class="item-quantity--item-price">



                                                                <div class="item-quantity">
                                                                    <div class="num-block">
                                                                        <div class="num-in">
                                                                            <button  class="plus border-0 bg-transparent" wire:click="increaseItem({{ $product->id  }})"></button>
                                                                            <input type="text" min="1" class="in-num" value="{{ $product->number }}" readonly>
                                                                            <button  class="minus border-0 bg-transparent @if( $product->number  == 1 ) dis @endif"   @if( $this->disabled == true ) disabled @endif wire:click="decreaseItem({{ $product->id }})"></button>
                                                                        </div>
                                                                    </div>
                                                                    <button  wire:click.prevent="deleteConfirmation({{ $product->id }})" class="item-remove-btn mr-3">
                                                                        <i class="far fa-trash-alt"></i>
                                                                        {{ __('messages.delete_model')}}
                                                                    </button>
                                                                </div>

                                                                <div class="item-price">
                                                                    {{ $product->number }}
                                                                    <span class="text-sm mr-1">{{ __('messages.number')}}</span>
                                                                </div>
                                                                <div class="item-price">
                                                                    {{ priceFormat( $product->cartItemProductPrice() ) }}
                                                                    <span class="text-sm mr-1">{{ __('messages.toman')}}</span>
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



                                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">


                                    @if( count($cartItems) > 0)
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
                                                <span>مبلغ کل ({{ $cartItemsCount }} کالا)</span><span> {{ priceFormat($totalProductPrice) }} {{ __('messages.toman') }}</span>
                                            </li>


                                            <li>
                                                <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                        data-html="true" data-placement="bottom"
                                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span>وابسته به آدرس</span>
                                            </li>
                                        </ul>
                                        <div class="checkout-summary-devider">
                                            <div></div>
                                        </div>
                                        <div class="checkout-summary-content">
                                            <div class="checkout-summary-price-title">{{ __('messages.the_amount_payable')}}</div>
                                            <div class="checkout-summary-price-value">
                                                <span class="checkout-summary-price-value-amount">{{ priceFormat($totalProductPrice) }}</span>
                                                {{ __('messages.toman') }}
                                            </div>
                                            <a href={{ route('check.address') }}" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                     {{  __('messages.continue_and_pay') }}
                                                </button>
                                            </a>
                                            <div>
                                                <span>
                                                   {{ __('messages.shopping_cart_message') }}
                                                </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                    data-placement="bottom"
                                                    title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            @else
            <div class="row">
                <div class="col-12">
                    <div class="dt sl dt-sn dt-sn--box border pt-3 pb-5">
                        <div class="cart-page cart-empty">
                            <div class="circle-box-icon">
                                <i class="mdi mdi-cart-remove"></i>
                            </div>
                            <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                            <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                            <div class="cart-empty-links mb-5">
                                <a href="#" class="border-bottom-dt">لیست مورد علاقه من</a>
                                <a href="#" class="border-bottom-dt">محصولات شگفت‌انگیز</a>
                                <a href="#" class="border-bottom-dt">محصولات پرفروش روز</a>
                            </div>
                            <a href="{{  route('home') }}" class="btn-primary-cm">ادامه خرید در دیدیکالا</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

    {{--  <main>
        <div class="container">

            <div class="row d-flex justify-content-center">

                @if( count($cartItems) < 1  )
                    <div class="col-lg-9 mb-5" style="height: 280px">
                        <div class="cart-content my-4 d-flex justify-content-center align-items-center h-425px" style="height: 280px">
                               <div>
                                   <p class="text-center">{{ __('messages.your_shopping_cart_is_empty') }}</p>
                               </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-9">
                        <div class="cart-content">
                            <div class="title">
                                <h4> سبد خرید </h4>
                            </div>

                            @php
                                $totalProductPrice = 0;
                                $totalDiscount = 0;
                            @endphp

                        @foreach( $cartItems as $cartItem )
                                @php
                                    $totalProductPrice += $cartItem->cartItemProductPrice();
                                    $totalDiscount += $cartItem->cartItemProductDiscount();
                                @endphp

                                <div class="row shopping-cart-item">

                                    <div class="col-lg-1 col-md-2">
                                        <div class="d-block border-dark border-bottom text-center">{{ $cartItem->id }}</div>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <a href="{{ route('product.details',$cartItem->product->slug) }}" class="d-block"><img src="{{ asset('storage/' . $cartItem->product->thumbnail_image) }}" alt="cart-item-image" class="img-fluid mb-3"></a>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <a href="javascript:void(0)" class="shopping-cart-title">{{ $cartItem->product->title_persian }}</a>
                                        <p class="shopping-cart-detail"> {{ __('messages.numbers') }}: {{ $cartItem->number  }} </p>

                                        @if(!empty($cartItem->color))
                                            <p class="shopping-cart-detail"> {{ __('messages.product_color') }}: {{ $cartItem->color->color_name }} </p>
                                        @else
                                            <p class="shopping-cart-detail">{{ __('messages.no_color_has_been_selected_for_this_product') }}</p>
                                        @endif

                                        @if(!empty($cartItem->warranty))
                                            <p class="shopping-cart-detail"> {{ __('messages.warranty') }}: {{ $cartItem->warranty->guarantee_name }} </p>
                                        @else
                                            <p class="shopping-cart-detail">{{ __('messages.no_warranty_has_been_selected_for_this_product') }}</p>
                                        @endif

                                        <p class="shopping-cart-detail"> {{ __('messages.price') }}   {{ priceFormat( $cartItem->cartItemProductPrice() ) }} {{ __('messages.toman') }}</p>

                                        @if( !empty($cartItem->product->activeAmazingSale()))
                                            <p class="shopping-cart-detail text-danger">{{ __('messages.cart_discount') }} {{ priceFormat( $cartItem->cartItemProductDiscount() ) }} </p>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 ">
                                        <div class="button-container d-flex justify-content-start align-items-start mb-3">
                                            <button class="cart-qty-plus" wire:click="increaseItem({{ $cartItem->id  }})" type="button" value="+">+</button>
                                            <input type="text" name="qty" min="1" class="qty form-control text-center" value="{{ $cartItem->number }}">
                                            <button class="cart-qty-minus" @if( $cartItem->number  == 1 ) disabled @endif @if( $this->disabled == true ) disabled @endif wire:click="decreaseItem({{ $cartItem->id }})" type="button" value="-">-</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 d-flex justify-content-center align-items-center cart-items-op">
                                        <a href="javascript:void(0)"  wire:click.prevent="deleteConfirmation({{ $cartItem->id }})"><i class="fa  fa-trash"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif


                @if( count($cartItems) > 0)
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
                                <span>{{ __('messages.total_price') }}</span>
                                <span class="text-danger"> {{ priceFormat($totalProductPrice) }} {{ __('messages.toman') }} </span>
                            </div>
                            <div class="product-seller-row">
                                <span>{{ __('messages.order_discount_amount') }}  </span>
                                <span class="text-danger">{{  priceFormat( $totalDiscount ) }} {{ __('messages.toman') }}</span>
                            </div>
                            <div class="product-seller-row">
                                <span>{{ __('messages.delivery_amount') }}</span>
                                <span class="text-danger">وابسته به آدرس</span>
                            </div>
                            <div class="product-seller-row">
                                <span>{{ __('messages.final_price') }}</span>
                                <span class="text-danger"> {{ priceFormat( $totalProductPrice - $totalDiscount   ) }} {{ __('messages.toman') }}</span>
                            </div>

                            <a href="{{ route('check.address') }}" class="btn btn-danger add-cart-btn">ادامه و ثبت سفارش</a>
                            <p class="font-12 text-muted mt-3 line-height text-center">
                            {{ __('messages.register_the_goods_in_your_basket_are_not_reserved_complete_the_next_steps_to_place_an_order') }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>


        </div>
    </main>  --}}
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
        window.addEventListener('show-result', ({detail: { type, message }}) => {
            Swal.fire({
                icon: type,
                text: message,
            });
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

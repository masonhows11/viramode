<div class="bottom-header dt-sl mb-sm-bottom-header">
    <div class="container main-container">
        <!-- Start Main-Menu -->
        <nav class="main-menu d-flex justify-content-md-between justify-content-end dt-sl">
            <!-- Start mega menu column -->
            <ul class="list hidden-sm">
                <li class="list-item category-list">
                    <a href="#"><i class="fal fa-bars ml-1"></i>{{ __('messages.category_goods') }}</a>
                        <ul>
                            @foreach( $categories as $child )
                                <li>
                                    <a href="{{ route('category',['slug' => $child->slug]) }}">{{ $child->title_persian }}</a>
                                    <ul class="row">
                                        <li class="mr-1">
                                            @if( $child->children != null  )
                                                @include('front_end.category.child_categories',['category' => $child->children])
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                </li>
            </ul>
            <!-- End mega menu column -->

            <!-- Start Cart -->
            <div class="nav mr-auto">

                <div class="nav-item cart--wrapper">

                    @guest
                    <a class="nav-link" href="{{  route('auth.login.form') }}">
                        <span class="label-dropdown">سبد خرید</span>
                        <i class="mdi mdi-cart-outline"></i>
                        <span class="count">2</span>
                    </a>
                    @endguest
                    @auth
                    <livewire:front.cart.cart-header />
                    @endauth


                    {{--  <div class="header-cart-info">
                        <div class="header-cart-info-header">
                            <div class="header-cart-info-count">
                                3 کالا
                            </div>
                            <a href="#" class="header-cart-info-link">
                                <span>مشاهده سبد خرید</span>
                            </a>
                        </div>
                        <ul class="header-basket-list do-nice-scroll">
                            <li class="cart-item">
                                <a href="#" class="header-basket-list-item">
                                    <div class="header-basket-list-item-image">
                                        <img src="{{ asset('/front_assets/img/cart/1.jpg') }}" alt="">
                                    </div>
                                    <div class="header-basket-list-item-content">
                                        <p class="header-basket-list-item-title">
                                            گوشی موبایل سامسونگ مدل Galaxy A30 SM-A305F/DS دو سیم کارت ظرفیت
                                            64 گیگابایت
                                        </p>
                                        <div class="header-basket-list-item-footer">
                                            <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #2196f3"></div>
                                                                آبی
                                                            </span>
                                            </div>
                                            <button class="header-basket-list-item-remove">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="cart-item">
                                <a href="#" class="header-basket-list-item">
                                    <div class="header-basket-list-item-image">
                                        <img src="{{ asset('/front_assets/img/cart/2.jpg') }}" alt="">
                                    </div>
                                    <div class="header-basket-list-item-content">
                                        <p class="header-basket-list-item-title">
                                            گوشی موبایل هوآوی مدل Y9 2019 JKM-LX1 دو سیم کارت ظرفیت 64
                                            گیگابایت
                                        </p>
                                        <div class="header-basket-list-item-footer">
                                            <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #212121"></div>
                                                                سفید
                                                            </span>
                                            </div>
                                            <button class="header-basket-list-item-remove">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="cart-item">
                                <a href="#" class="header-basket-list-item">
                                    <div class="header-basket-list-item-image">
                                        <img src="{{ asset('/front_assets/img/cart/3.jpg') }}" alt="">
                                    </div>
                                    <div class="header-basket-list-item-content">
                                        <p class="header-basket-list-item-title">
                                            گوشی موبایل سامسونگ مدل Galaxy A70 SM-A705FN/DS دو سیم‌کارت
                                            ظرفیت 128 گیگابایت
                                        </p>
                                        <div class="header-basket-list-item-footer">
                                            <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #FFFFFF"></div>
                                                                سفید
                                                            </span>
                                            </div>
                                            <button class="header-basket-list-item-remove">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="header-cart-info-footer">
                            <div class="header-cart-info-total">
                                <span class="header-cart-info-total-text">مبلغ قابل پرداخت:</span>
                                <p class="header-cart-info-total-amount">
                                                <span class="header-cart-info-total-amount-number">
                                                    9,500,000 <span>تومان</span></span>
                                </p>
                            </div>

                            <div>
                                <a href="#" class="header-cart-info-submit">
                                    ثبت سفارش
                                </a>
                            </div>
                        </div>
                    </div>  --}}

                </div>
            </div>
            <!-- End Cart -->

            <!-- Start button side menu -->
            <button class="btn-menu">
                <div class="align align__justify">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <!-- End button side menu -->

            <!-- Start side menu -->
            <div class="side-menu">
                <div class="logo-nav-res dt-sl text-center">
                    <a href="{{ route('home') }}" class="text-danger" style="font-size: 1.3rem; font-weight:900">
                        {{ __('messages.site_name') }}
                        {{--  <img src="{{ asset('front_assets/img/logo.png') }}" alt="">  --}}
                    </a>
                </div>
                <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                    <form action="">
                        <input type="text" name="s" placeholder="جستجو کنید...">
                        <i class="mdi mdi-magnify"></i>
                    </form>
                </div>
                <ul class="navbar-nav dt-sl">
                    @foreach( $categories as $child )
                        <li class="sub-menu">
                            <a href="{{ route('category',['slug' => $child->slug]) }}">{{ $child->title_persian }}</a>
                            <ul>
                                <li class="">
                                @if( $child->children != null  )
                                    @include('front_end.category.responsive_child_category',['category' => $child->children])
                                @endif
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End side menu -->

            <!-- Start Overlay side menu -->
            <div class="overlay-side-menu"></div>
            <!-- End Overlay side menu -->

        </nav>
        <!-- End Main-Menu -->
    </div>
</div>

@extends('front_end.layouts.master_front')
@section('main_content')

            @php
                $route = request()->route()->getName();
                $user = Auth::user();
            @endphp

            <main class="main-content dt-sl mb-3">
                <div class="container main-container">
                    <div class="row">

                        <!-- Start Sidebar -->
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                            <div class="profile-sidebar dt-sl">
                                <div class="dt-sl dt-sn border mb-3">
                                    <div class="profile-sidebar-header dt-sl">
                                        <div class="d-flex align-items-center">
                                            <div class="profile-avatar">
                                                <img src="{{ asset('default_image/avatar.jpg') }}" alt="">
                                            </div>
                                            <div class="profile-header-content mr-3 mt-2">
                                                <span class="d-block profile-username">جلال بهرامی راد</span>
                                                <span class="d-block profile-phone">09xxxxxxxxx</span>
                                            </div>
                                        </div>
                                        <div class="profile-point mt-3 mb-2 dt-sl">
                                            <span class="label-profile-point">امتیاز شما:</span>
                                            <span class="float-left value-profile-point">120</span>
                                        </div>
                                        <div class="profile-link mt-2 dt-sl">
                                            <div class="row">
                                                <div class="col-6 text-center">
                                                    <a href="#">
                                                        <i class="mdi mdi-lock-reset"></i>
                                                        <span class="d-block">تغییر رمز</span>
                                                    </a>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <a href="#">
                                                        <i class="mdi mdi-logout-variant"></i>
                                                        <span class="d-block">خروج از حساب</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dt-sl dt-sn mb-3 text-center">
                                    <a href="#">
                                        <img src="./assets/img/banner/sidebar-banner-3.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="dt-sl dt-sn border mb-3">
                                    <div class="profile-menu-section dt-sl">
                                        <div class="label-profile-menu mt-2 mb-2">
                                            <span>حساب کاربری شما</span>
                                        </div>
                                        <div class="profile-menu">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('user.profile') }}"
                                                         class="{{ $route === 'user.profile' ? 'active' : '' }}">
                                                        <i class="mdi mdi-account-circle-outline"></i>
                                                        پروفایل
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.orders') }}"
                                                    class="{{ $route === 'all.orders' ? 'active' : '' }}">
                                                        <i class="mdi mdi-basket"></i>
                                                        همه سفارش ها
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('order.returned.request') }}"
                                                    class="{{ $route === 'order.returned.request' ? 'active' : '' }}">
                                                        <i class="mdi mdi-backburger"></i>
                                                        درخواست مرجوعی
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('favorites') }}"
                                                    class="{{ $route === 'favorites' ? 'active' : '' }}">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                        لیست علاقمندی ها
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('comments') }}"
                                                    class="{{ $route === 'comments' ? 'active' : '' }}">
                                                        <i class="mdi mdi-glasses"></i>
                                                        نقد و نظرات
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('addresses') }}"
                                                    class="{{ $route === 'addresses' ? 'active' : '' }}">
                                                        <i class="mdi mdi-sign-direction"></i>
                                                        آدرس ها
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="mdi mdi-eye-outline"></i>
                                                        بازدیدهای اخیر
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.account.information') }}"
                                                    class="{{ $route === 'user.account.information' ? 'active' : '' }}">
                                                        <i class="mdi mdi-account-edit-outline"></i>
                                                        اطلاعات شخصی
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Sidebar -->

                        <!-- Start Content -->
                        @yield('left_profile_content')
                        <!-- End Content -->

                    </div>
                    <!-- Start Product-Slider -->
                    <section class="slider-section dt-sl mt-5 mb-5">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide no-after-title-wide">
                                    <h2>محصولات پیشنهادی برای شما</h2>
                                    <a href="#">مشاهده همه</a>
                                </div>
                            </div>

                            <!-- Start Product-Slider -->
                            <div class="col-12 px-res-0">
                                <div class="product-carousel carousel-lg owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">185,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product-Slider -->

                        </div>
                    </section>
                    <!-- End Product-Slider -->
                </div>
            </main>
            {{-- <div class="row">

                <!--  sidebar menu ----->
                <!---------------------->
                <div class="col-lg-3">
                    <div class="profile-card pb-0"><!-- start avatar box -->
                        <img src="{{ asset('default_image/avatar.jpg') }}" alt="profile-user-avatar" class="profile-avatar img-thumbnail">
                        <p class="font-13 text-center">{{ $user->first_name != null  &&  $user->last_name != null
                            ? $user->FullName : __('messages.no_name') }}</p>
                        <div class="row border-top">
                            <div class="col-6 border-end text-center">
                                <i class="fa fa-lock font-13 text-muted my-2"></i>
                                <a href="{{ route('mobile.update.form') }}" class="text-dark d-block font-12 mb-2">{{ __('messages.change_mobile_number') }}</a>
                            </div>
                            <div class="col-6 text-center">
                                <i class="fas fa-sign-out-alt font-13 text-muted my-2"></i>
                                <a href="{{ route('auth.log.out') }}" class="text-dark d-block font-12 mb-2">{{ __('messages.sign_out_of_the_user_account') }}</a>
                            </div>
                        </div>
                    </div><!-- end avatar box -->

                    <div class="profile-card"><!-- start sidebar menu -->
                        <ul class="profile-sidebar">
                            <li><a href="{{ route('user.profile') }}" class="{{ $route === 'user.profile' ? 'text-info' : '' }}"><i class="far fa-user-circle align-middle me-2"></i>پروفایل</a></li>
                            <li><a href="{{ route('mobile.update.form') }}" class="{{ $user->mobile == null ? 'text-danger' : '' }}" ><i class="fas fa-mobile-alt align-middle me-2"></i>{{ __('messages.mobile') }}  {{ $user->mobile == null ? ' - '  . __('messages.update_needed') : '' }}</a></li>
                            <li><a href="{{ route('email.update.form') }}" class="{{ $user->email == null ? 'text-danger' : '' }}"><i class="fas fa-envelope align-middle me-2  "></i>{{ __('messages.email') }}   {{ $user->email == null ? __('messages.update_needed') : '' }}</a></li>
                            <li><a href="{{ route('all.orders') }}"><i class="fas fa-shopping-cart align-middle me-2"></i>سفارشات</a></li>
                            <li><a href="{{ route('order.returned.request') }}"><i class="fa  fa-retweet align-middle me-2"></i>درخواست مرجوعی</a></li>
                            <li><a href="{{ route('favorites') }}"><i class="far fa-heart align-middle me-2"></i>لیست علاقمندی ها</a></li>
                            <li><a href="{{ route('compare.products') }}"><i class="fas fa-random align-middle me-2"></i>مقایسه محصولات</a></li>
                            <li><a href="{{ route('comments') }}"><i class="far fa-comment align-middle me-2"></i>نظرات</a></li>
                            <li><a href="{{ route('addresses') }}"><i class="fas fa-map-marker-alt align-middle me-2"></i>آدرس ها</a></li>
                            <li><a href="{{ route('tickets') }}"><i class="fas fa-ticket-alt align-middle me-2"></i>تیکت ها</a></li>
                            <li><a href="{{ route('user.account.information') }}" class="{{ $route === 'user.account.information' ? 'text-info' : '' }}"><i class="far fa-address-card align-middle me-2"></i>اطلاعات حساب</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end sidebar menu -->
                <!---------------------->

                <!-- left content ------>
                <!---------------------->
                <div class="col-lg-9">
                @yield('left_profile_content')
                </div>
                <!-- end left content ------>
                <!---------------------->

            </div> --}}


@endsection


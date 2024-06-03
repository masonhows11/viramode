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
                                                <a href="{{ route('user.profile') }}">
                                                    <img src="{{ asset('default_image/avatar.jpg') }}" alt="user-avatar">
                                                </a>

                                            </div>
                                            <div class="profile-header-content mr-3 mt-2">
                                                <span class="d-block profile-username">{{ $user->first_name ? $user->first_name : 'کاربر' }} {{ $user->last_name ? $user->last_name : ' گرامی ' }}</span>
                                                <span class="d-block profile-phone">{{  $user->mobile ? $user->mobile : __('messages.mobile_number_not_registered') }}</span>
                                            </div>
                                        </div>
                                        {{-- <div class="profile-point mt-3 mb-2 dt-sl">
                                            <span class="label-profile-point">امتیاز شما:</span>
                                            <span class="float-left value-profile-point">120</span>
                                        </div> --}}
                                        <div class="profile-link mt-2 dt-sl">
                                            <div class="row">
                                                {{-- <div class="col-6 text-center">
                                                    <a href="javascript:void(0)">
                                                        <i class="mdi mdi-lock-reset"></i>
                                                        <span class="d-block">تغییر رمز</span>
                                                    </a>
                                                </div> --}}
                                                <div class="col-6 text-center">
                                                    <a href="{{  route('auth.log.out') }}">
                                                        <i class="mdi mdi-logout-variant"></i>
                                                        <span class="d-block">خروج از حساب</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="dt-sl dt-sn mb-3 text-center">
                                    <a href="#">
                                        <img src="{{ asset('/front_assets/img/banner/sidebar-banner-3.jpg') }}" class="img-fluid" alt="">
                                    </a>
                                </div> --}}

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
                                                        {{  __('messages.all_orders') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('current.orders') }}"
                                                    class="{{ $route === 'current.orders' ? 'active' : '' }}">
                                                      <i class="fas fa-cart-plus" style="font-size:17px"></i>
                                                        {{  __('messages.orders_new') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('paid.orders') }}"
                                                    class="{{ $route === 'paid.orders' ? 'active' : '' }}">
                                                    <i class="fas fa-check-circle fa-xs" style="font-size:17px"></i>
                                                    {{ __('messages.orders_paid')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('unpaid.orders') }}"
                                                    class="{{ $route === 'unpaid.orders' ? 'active' : '' }}">
                                                     <i class="fas fa-shopping-basket fa-xs" style="font-size:17px"></i>
                                                        {{ __('messages.orders_unpaid')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('favorites') }}"
                                                    class="{{ $route === 'favorites' ? 'active' : '' }}">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                        لیست علاقمندی ها
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('comments') }}"
                                                    class="{{ $route === 'comments' ? 'active' : '' }}">
                                                        <i class="mdi mdi-glasses"></i>
                                                        نقد و نظرات
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <a href="{{ route('profile.address.index') }}"
                                                    class="{{ $route === 'profile.address.index' ? 'active' : '' }}">
                                                        <i class="mdi mdi-sign-direction"></i>
                                                        آدرس ها
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

                    <!-- End Product-Slider -->
                </div>
            </main>
@endsection


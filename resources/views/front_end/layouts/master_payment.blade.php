<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/image/icon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    @include('front_end.layouts.header_styles')

</head>
<body>

<!-- start header -->
<header class="w-100 bg-white"><!-- start header -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-2 header-logo">
                <a href="http://goodshop.test">
                    <h3 class="h3 text-center my-2  text-danger">خرید خوب</h3>
                </a>
            </div>
        </div>
        <div class="row"><!-- start checkout steps -->
            @yield('checkout-step')
        </div><!-- end checkout steps -->
    </div>
</header><!-- end header -->
<!-- end header -->



<!-- start main -->
    @yield('main_content')
<!-- end main -->

<!-- start footer -->
<livewire:front.layout.front-footer/>
<!-- end footer -->


@include('front_end.layouts.footer_scripts')
@include('front_end.layouts.alert.alert')
@include('front_end.layouts.alert.toast_alert')
@include('front_end.layouts.alert.delete_confirm',['className'=> 'delete-item'])
@stack('payment_custom_scripts')
</body>

</html>


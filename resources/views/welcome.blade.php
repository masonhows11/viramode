<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/image/icon.png') }}">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('messages.site_name') }}</title>
    @include('front_end.layouts.header_styles')

</head>

<body>


    <div class="wrapper">

        <header class="main-header">


            <livewire:front.layout.front-header />



            <livewire:front.layout.front-navbar />


        </header>


        <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">

            <div class="container main-container">


                <!-- Start newest products Banner -->
                <livewire:front.layout.front-newest />
                <!-- End Newest products Banner -->

                <!-- Start best seller Product-Slider -->
                <livewire:front.layout.front-best-sellers />
                <!-- End Product-Slider -->

                <!-- Start most visited Product-Slider -->
                <livewire:front.layout.front-most-visited />
                <!-- End Product-Slider -->

                <!-- Start Category-Section -->
                <livewire:front.layout.front-category />
                <!-- End Category-Section -->

                <!-- Start Feature-Product -->
                <livewire:front.layout.front-suggestions />
                <!-- End Feature-Product -->

            </div>



        </main>
        <!-- End main-content -->


        <livewire:front.layout.front-footer />

    </div>


    @include('front_end.layouts.footer_scripts')
    @include('front_end.layouts.alert.delete_confirm', ['className' => 'delete-item'])
    @include('front_end.layouts.alert.alert')
    @stack('front_custom_scripts')
    <livewire:scripts/>


</body>

</html>

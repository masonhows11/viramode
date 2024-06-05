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
        <!-- Start header -->
        <header class="main-header">

            <!-- Start topbar -->
            <livewire:front.layout.front-header />
            <!-- End topbar -->

            <!-- Start bottom-header -->
            <livewire:front.layout.front-navbar />
            <!-- End bottom-header -->

        </header>
        <!-- End header -->

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






            {{-- <div x-data="loadPosts">
                 </div> --}}
        </main>
        <!-- End main-content -->

        <!-- Start footer -->
        <livewire:front.layout.front-footer />
        <!-- End footer -->
    </div>


    @include('front_end.layouts.footer_scripts')
    @include('front_end.layouts.alert.delete_confirm', ['className' => 'delete-item'])
    @include('front_end.layouts.alert.alert')
    @stack('front_custom_scripts')
    <livewire:scripts/>


    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('loadPosts', function() {

                posts : []

                fetch('{{ route('best.seller.products') }}', {
                        headers: {
                            accept: 'application/json',
                            'User-agent': 'learning app',
                        }
                    })
                    .then((response) => response.json())
                    .then((res) => console.log(res.products))
                    .catch(error => console.log(error))

            })
        })
    </script> --}}



</body>

</html>

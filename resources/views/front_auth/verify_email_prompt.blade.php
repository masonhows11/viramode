@extends('front_end.layouts.master_auth')
@section('page_title')
    {{ __('messages.verify_account') }}
@endsection
@section('main_content')
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">

                <div class="logo-area  text-center mb-3">
                    <a href="{{  route('home') }}" class="text-danger" style="font-size: 1.3rem">
                        {{--<img src="{{ asset('front_assets/img/logo.png') }}" class="img-fluid" alt="logo">--}}
                        {{ __('messages.site_name') }}
                    </a>
                </div>


                <div class="auth-wrapper form-ui border pt-4">

                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">{{ __('messages.verify_account') }}</h2>
                    </div>

                    <form action="{{ route('auth.verify.email.send') }}" method="post">
                        @csrf

                        <div class="form-row-title">
                            <h3>ایمیل</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input type="text" name="email" class="input-ui pr-2" placeholder="ایمیل" value="{{ old('email') }}">
                            <i class="mdi mdi-account-circle-outline"></i>
                        </div>

                        <div class="form-row mt-2">
                            @include( 'front_auth.inline_alert')
                        </div>

                        <div class="form-row mt-3">
                            <button type="submit" id="verify-email-btn" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-login-variant"></i>

                                <div class="spinner-border d-none" id="spinnder-element" style="border-colore:rgba(255, 255, 255, 0.2)" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>

                                <div id="login-text-element">
                                    {{  __('messages.send_activate_email') }}
                                </div>


                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('front_custom_scripts')
    <script>
        $(document).ready(function(){
            $("#verify-email-btn").click(function(){
                $("#login-text-element").addClass('d-none');
                $("#spinnder-element").removeClass('d-none');
            });
        });
    </script>
@endpush


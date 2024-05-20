@extends('front_end.layouts.master_auth')
@section('page_title')
    {{ __('messages.register_user') }}
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
                        <h2 class="font-weight-bold">ثبت نام</h2>
                    </div>
                   {{-- <div class="message-light">
                        اگر قبلا با ایمیل ثبت ‌نام کرده‌اید، نیاز به ثبت ‌نام مجدد با شماره همراه ندارید
                    </div>--}}
                    <form action="{{ route('auth.register.user') }}" method="post">
                        @csrf

                        <div class="form-row-title">
                            <h3>ایمیل</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input type="text" name="email" class="input-ui pr-2" value="{{ old('email') }}" placeholder="ایمیل خود را وارد نمایید">
                            <i class="mdi mdi-account-circle-outline"></i>
                        </div>

                        <div class="form-row-title">
                            <h3>رمز عبور</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input type="password" name="password" class="input-ui pr-2" placeholder="رمز عبور خود را وارد نمایید">
                            <i class="mdi mdi-lock-open-variant-outline"></i>
                        </div>


                        <div class="form-row mt-2">
                            @include( 'front_auth.inline_alert')
                        </div>

                        <div class="form-row mt-2">
                            <div class="custom-control custom-checkbox float-right mt-2">
                                <input type="checkbox" class="custom-control-input" name="rule" id="customCheck3">
                                <label class="custom-control-label text-justify" for="customCheck3">
                                    <a href="#">حریم خصوصی</a> و <a href="#">شرایط و قوانین</a> استفاده از سرویس
                                    های سایت ویرامد را مطالعه نموده و با کلیه موارد آن موافقم.
                                </label>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                                ثبت نام در ویرا مد
                            </button>
                        </div>
                    </form>


                    <div class="form-footer mt-3">
                        <div>
                            <span class="font-weight-bold">{{ __('messages.already_registered') }}</span>
                            <a href="{{ route('auth.login.form') }}" class="mr-3 mt-2">{{ __('messages.login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('front_custom_scripts')
    <script>

        $(document).ready(function(){

           // console.log("Hello world!");

        });

    </script>
@endpush


@extends('front_end.layouts.master_auth')
@section('page_title')
    {{ __('messages.validate_code_form') }}
@endsection
@section('main_content')


    <div class="container main-container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">

                <div class="logo-area  text-center mb-3">
                    <a href="{{ route('home') }}" class="text-danger" style="font-size: 1.3rem">
                        {{--<img src="{{ asset('front_assets/img/logo.png') }}" class="img-fluid" alt="logo">--}}
                        {{ __('messages.site_name') }}
                    </a>
                </div>
                <div class="auth-wrapper form-ui border pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">{{ __('messages.confirm_email') }}</h2>
                    </div>

                    <form action="{{ route('auth.validate.user') }}" method="post">
                        @csrf
                        <div class="form-row-title">
                            <h3>کد تایید را وارد کنید</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input type="text" name="otp" class="input-ui pr-2" placeholder="کد تایید را وارد کنید">
                            {{-- <i class="mdi mdi-account-circle-outline"></i>--}}
                        </div>
                        <div class="form-row mt-3">
                            <div class="col count-down-link-container">

                                @if( session()->has('auth_email') )
                                    <input type="hidden" name="email" value="{{ session()->get('auth_email') }}">
                                @endif

                                <div class="signup-login-form text-center d-none" id="resend-otp">
                                    @if( session()->has('token') )
                                        <a href="{{ route('auth.resend.token',['token' => session()->get('token')]) }}"
                                           id="resend-token"
                                           class="text-info text-decoration-none">{{ __('messages.resend_active_code') }}</a>
                                    @endif
                                </div>
                                <div class="signup-login-form text-center" id="timer-otp">
                                </div>

                            </div>

                        </div>
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="fad fa-arrow-right"></i>
                                تایید و ادامه
                            </button>
                        </div>
                    </form>
                    <div class="form-footer mt-3">
                        <div>
                            <span class="font-weight-bold">کاربر جدید هستید؟</span>
                            <a href="{{ route('auth.register.form') }}" class="mr-3 mt-2">ثبت نام در دیدیکالا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('front_custom_scripts')
    @if ( session()->has('token_time'))
        @php
            $token = session()->get('token_time');
            $timer = (( new \Carbon\Carbon( $token))->addMinutes(2)->timestamp - \Carbon\Carbon::now()->timestamp) * 1000 ;
        @endphp
        <script>
            let countDown = new Date().getTime() + {{ $timer }};
            let timer = $('#timer-otp');
            let resendOtp = $('#resend-otp');
            let x = setInterval(function () {
                let now = new Date().getTime();
                let distance = countDown - now;
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let second = Math.floor((distance % (1000 * 60)) / (1000));
                let tr_resend_code = '{{ __('messages.resend_active_code') }}';
                let tr_minutes = '{{ __('messages.and_minute') }}';
                let tr_second = '{{ __('messages.and_seconds') }}';
                if (minutes === 0) {
                    timer.html(tr_resend_code + second + tr_second)
                } else {
                    timer.html(tr_resend_code + minutes + tr_minutes + second + tr_second)
                }
                if (distance < 0) {
                    clearInterval(x);
                    timer.addClass('d-none')
                    resendOtp.removeClass('d-none');
                }
            }, 1000)
        </script>

    @endif
    {{-- <script>
         $(document).on('click', '#resend-token', function (event) {
             event.preventDefault();
             let token_guid = document.getElementById('token-guid').value;
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 method: 'POST',
                 url: '{{ route('auth.resend.token') }}',
                 data: {token_guid:token_guid}
             }).done(function (data) {
                 console.log(data);
                 if (data['status'] === 200) {
                     alert(data['success'])
                 }
                 if (data['status'] === 500) {
                     alert(data['error'])
                 }
             }).fail(function (data) {
                 if (data['status'] === 500) {
                     alert(data['exception'])
                 }
             });
         })
     </script>--}}
@endpush

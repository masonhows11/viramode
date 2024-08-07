@extends('admin_auth.auth_master')
@section('auth_admin_title')
    {{ __('messages.confirm_email') }}
@endsection
@section('main_content')
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6 my-2 alert-dive">
                @include('admin_auth.alert')
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <h3 class="mb-12 admin-logo-login">
                    {{-- <img alt="Logo" src="#" class="h-40px"/>--}}
                    {{ __('messages.site_name') }}
                </h3>
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto admin-validate-form">
                    <form action="{{ route('admin.validate.email') }}" method="post" class="form w-100 mb-10"
                          novalidate="novalidate">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">ورود دو مرحله ای</h1>
                            <div class="text-muted fw-bold fs-5 mb-5">وارد کردن کد تایید ارسال شده به شماره موبایل</div>
                        </div>


                        <div class="my-6 px-10">
                            <label for="email" class="form-label fs-6 fw-bolder text-dark">ایمیل</label>
                            <input class="form-control form-control-lg form-control-solid"
                                   name="email"
                                   id="email"
                                   dir="ltr"
                                   style="direction: ltr"
                                   type="text"/>

                            @error('email')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="my-6 px-10">
                            <label for="code" class="form-label fs-6 fw-bolder text-dark">کد فعال سازی را وارد کنید</label>
                            <input class="form-control form-control-lg form-control-solid"
                                   id="code"
                                   dir="ltr"
                                   style="direction: ltr"
                                   type="text"
                                   name="code"/>
                            @error('code')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-10 px-md-10">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> من را به خاطر بسپار !
                            </label>
                        </div>
                        <div class="d-flex flex-center">
                            <button type="submit" id="login-btn" class="btn btn-lg btn-primary fw-bolder">

                               
                                <div class="spinner-border d-none" id="spinnder-element" style="border-colore:rgba(255, 255, 255, 0.2)" role="status">
                                    <span class="sr-only"></span>
                                </div>

                                <div class="" id="login-text-element">
                                    {{  __('messages.login') }}
                                </div>

                            </button>
                        </div>
                        <div class="d-flex flex-center mt-5">
                            <a href="{{ route('admin.login.form') }}" class="fw-bolder">
                                <span class="indicator-label">بازگشت</span>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
@push('admin_custom_scripts')
<script>

    $(document).ready(function(){
       $("#login-btn").click(function(){
            $("#login-text-element").addClass('d-none');
            $("#spinnder-element").removeClass('d-none');
        });
    });

</script>
@endpush

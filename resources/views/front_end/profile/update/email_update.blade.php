@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.profile') }}
@endsection
@section('left_profile_content')
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div class="px-3 px-res-0">


                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <h2>ویرایش اطلاعات شخصی</h2>
                    </div>

                    <div class="form-ui additional-info dt-sl dt-sn pt-4">
                        <form action="{{ route('email.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">

                            <div class="row">


                                <div class="col-md-6 mb-3">
                                    <div class="form-row-title">
                                        <h3>آدرس ایمیل</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="email" name="email" class="input-ui pl-2 text-left dir-ltr"
                                            value="{{ $user->email }}">
                                    </div>

                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="dt-sl">
                                <div class="form-row mt-3 justify-content-end">
                                    <button type="submit" class="btn-primary-cm btn-with-icon ml-2">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        ثبت اطلاعات کاربری
                                    </button>

                                </div>
                            </div>
                        </form>
                        <a href="{{ route('user.profile') }}">
                            <button class="btn-primary-cm bg-secondary">انصراف</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
